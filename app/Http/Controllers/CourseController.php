<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //

    public function index()
    {
       // $courses = Course::with(['user', 'episodes'])->get();  => get all the relations
       $courses = Course::with('user')
                           ->select('courses.*', DB::raw(
                               '(
                                   SELECT COUNT(DISTINCT(user_id))

                                   FROM completions

                                   INNER JOIN episodes ON completions.episode_id = episodes.id

                                   WHERE episodes.course_id = courses.id

                               ) AS participants_on_the_course_via_episode '
                           ))
                           ->withCount('episodes')
                           ->latest()
                           ->get(); // get the realtion user and count times relation epidode

        return Inertia::render('Courses/Index', [

            'courses' => $courses,

        ]);

    }

    public function show($id)
    {
        $course = Course::where('id', $id)->with(['user', 'episodes'])->first();

        $watchedArrayBytheAuthUser = auth()->user()->episodes;

        return Inertia::render('Courses/Show', [
            'course' => $course,

            'watchedArrayEpisodesByAuthUser' => $watchedArrayBytheAuthUser,

        ]);

    }

    public function toggleProgressButtonEpisode(Request $request)
    {
        $id = $request->input('episodeId');

        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;

    }

    public function create()
    {
        return Inertia::render('Courses/CreateCourse');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'episodes' => ['required', 'array'],
            'episodes.*.title' => 'required',
            'episodes.*.description' => 'required',
            'episodes.*.video_url' => 'required'
        ]);

        $course = Course::create($request->all());

        foreach(request('episodes') as $episode){
            $episode['course_id'] = $course->id;

            Episode::create($episode);
        }

        return redirect()->route('courses.index')->with('messageSuccess', 'Felicititations Vous avez poste un cours.');
    }
}
