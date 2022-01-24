<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //

    public function index()
    {
       // $courses = Course::with(['user', 'episodes'])->get();  => get all the relations
       $courses = Course::with('user')->withCount('episodes')->get(); // get the realtion user and count times relation epidode

        return Inertia::render('Courses/Index', [

            'courses' => $courses,

        ]);

    }

    public function show(int $id)
    {
        $course = Course::where('id', $id)->with(['user', 'episodes'])->first();

        return Inertia::render('Courses/Show', [
            'course' => $course,

        ]);

    }

    public function toggleProgressButtonEpisode(Request $request)
    {
        $id = $request->input('episodeId');

        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;

    }
}
