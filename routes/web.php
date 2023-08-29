<?php

use App\Http\Controllers\HomepageController;
use App\Http\Livewire\Ui\Experience\Index as ExperienceIndex;
use App\Http\Livewire\Ui\Experience\View as ExperienceView;
// use App\Http\Livewire\Skill\Explorer as SkillExplorer;
use App\Http\Livewire\Ui\Skill\Index as SkillIndex;
use App\Http\Livewire\Ui\Skill\View as SkillView;
use App\Http\Livewire\Ui\Demo\Index as DemoIndex;
use App\Http\Livewire\Ui\Demo\View as DemoView;
use App\Http\Livewire\Ui\Project\{
    Index as ProjectIndex,
    View as ProjectView,
};
use App\Http\Livewire\Ui\Post\{
    Index as PostIndex,
    Category as PostCategory,
    View as PostView,
};
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
// Route::get('/skills', SkillExplorer::class)->name('skills');

// Route::get('/skill/{skill}', function (Skill $skill) {
//     return view('skill', ['skill' => $skill]);
// })->name('skill');

// Route::get('/skillsg', function () {
//     return "Skills Explorer";
// })->name('skills.group');

/*
|--------------------------------------------------------------------------
| Skills
|--------------------------------------------------------------------------
|
*/
Route::get('/skills', SkillIndex::class)->name('skills');
Route::get('/skill/{skill}', SkillView::class)->name('skill');

/*
|--------------------------------------------------------------------------
| Projects
|--------------------------------------------------------------------------
|
*/
Route::get('/projects', ProjectIndex::class)->name('projects');
Route::get('/project/{project}', ProjectView::class)->name('project');

/*
|--------------------------------------------------------------------------
| Demos
|--------------------------------------------------------------------------
|
*/
Route::get('/demos', DemoIndex::class)->name('demos');
Route::get('/demo/{demo}', DemoView::class)->name('demo');

/*
|--------------------------------------------------------------------------
| Experience
|--------------------------------------------------------------------------
|
*/
Route::get('/experiences', ExperienceIndex::class)->name('experiences');
Route::get('/experience/{experience}', ExperienceView::class)->name('experience');

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
|
*/
Route::get('/posts', PostIndex::class)->name('posts');
Route::get('/posts/{category}', PostCategory::class)->name('posts.category');
Route::get('/post/{year}/{month}/{day}/{post}', PostView::class)->name('post');

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
