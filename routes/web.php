<?php

use App\Http\Controllers\ProfileController;
use App\Models\Demo;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/skills', function () {
    return "Skills Explorer";
})->name('skills');

Route::get('/skill/{skill}', function (Skill $skill) {
    return view('skill', ['skill' => $skill]);
})->name('skill');

Route::get('/skills', function () {
    return "Skills Explorer";
})->name('skills.group');



Route::get('/projects', function () { return "Projects"; })->name('projects');
Route::get('/project/{project}', function (Project $project) { return "Project ".$project->name; })->name('project');

Route::get('/demos', function () { return "demos"; })->name('demos');
Route::get('/demo/{demo}', function (Demo $demo) { return "demos ".$demo->name; })->name('demo');

Route::get('/experiences', function () { return "experiences"; })->name('experiences');
Route::get('/experience/{experience}', function (Experience $experience) { return "experience ".$experience->name; })->name('experience');

Route::get('/posts', function () { return "posts"; })->name('posts');
Route::get('/post/{post}', function (Post $post) { return "post ".$post->name; })->name('post');



require __DIR__.'/auth.php';
