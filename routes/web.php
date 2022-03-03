<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::post('/courses', [CourseController::class, 'store'])->name('course.store');

Route::get('/course/{id}', [CourseController::class, 'show']);

Route::post('/toggleProgressButtonEpisodeVueServerSide', [CourseController::class, 'toggleProgressButtonEpisode']);

Route::get('/course', [CourseController::class, 'create'])->name('course.create');

Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');

Route::patch('/course/{id}', [CourseController::class, 'update'])->name('course.update');

