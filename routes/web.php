<?php

use App\Http\Controllers\HomepageController;
use App\Http\Livewire\Demo\Explorer as DemoExplorer;
use App\Http\Livewire\Project\Explorer as ProjectExplorer;
use App\Http\Livewire\Experience\Timeline;
use App\Http\Livewire\Experience\ViewExperience;
use App\Http\Livewire\Ui\Post\PostsCategory;
use App\Http\Livewire\Ui\Post\PostsHome;
use App\Http\Livewire\Ui\Post\ViewPost;
use App\Http\Livewire\Skill\Explorer as SkillExplorer;
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

// Homepage
Route::get('/', [HomepageController::class, 'show'])->name('home');

// Skills
Route::get('/skills', SkillExplorer::class)->name('skills');

Route::get('/skill/{skill}', function (Skill $skill) {
    return view('skill', ['skill' => $skill]);
})->name('skill');

Route::get('/skillsg', function () {
    return "Skills Explorer";
})->name('skills.group');


/*
|--------------------------------------------------------------------------
| Projects
|--------------------------------------------------------------------------
|
*/
Route::get('/projects', ProjectExplorer::class)->name('projects');
Route::get('/project/{project}', function (Project $project) { return view('project', ['project' => $project]); })->name('project');

/*
|--------------------------------------------------------------------------
| Demos
|--------------------------------------------------------------------------
|
*/
Route::get('/demos', DemoExplorer::class)->name('demos');
Route::get('/demo/{demo}', function (Demo $demo) { return view('demo', ['demo' => $demo]); })->name('demo');

/*
|--------------------------------------------------------------------------
| Experience
|--------------------------------------------------------------------------
|
*/
Route::get('/experiences', Timeline::class)->name('experiences');
Route::get('/experience/{experience}', ViewExperience::class)->name('experience');

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
|
*/
Route::get('/posts', PostsHome::class)->name('posts');
Route::get('/posts/{category}', PostsCategory::class)->name('posts.category');
Route::get('/post/{year}/{month}/{day}/{post}', ViewPost::class)->name('post');

/*
|--------------------------------------------------------------------------
| Stuff
|--------------------------------------------------------------------------
|
*/
Route::get('/secret', function () {
    return view('secret');
})->name('the.secret');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
require __DIR__.'/auth.php';
