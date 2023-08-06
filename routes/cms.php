<?php

use App\Http\Livewire\Cms\BulletPointsEditor;
use App\Http\Livewire\Cms\Dashboard;
use App\Http\Livewire\Cms\DemosEditor;
use App\Http\Livewire\Cms\ExperiencesEditor;
use App\Http\Livewire\Cms\PostCategoriesEditor;
use App\Http\Livewire\Cms\PostsEditor;
use App\Http\Livewire\Cms\ProjectsEditor;
use App\Http\Livewire\Cms\SkillGroupsEditor;
use App\Http\Livewire\Cms\SkillsEditor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
| Auth protected routes for the CMS pages.
| Prefix /cms
| Name   cms.
|
*/
Route::prefix('cms')->name('cms.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Homepage / Dashboard
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/', Dashboard::class)->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Bullet Points
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/bullet-points', BulletPointsEditor::class)->name('bullet-points');

    // Route::get('/bullet-points/{mode}', BulletPointsEditor::class)->name('bullet-points.add');

    // Route::get('/bullet-points/{editId}/{mode}', BulletPointsEditor::class)->name('bullet-points.edit');

    /*
    |--------------------------------------------------------------------------
    | Demos
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/demos', DemosEditor::class)->name('demos');

    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/skills', SkillsEditor::class)->name('skills');
    Route::get('/skills/groups', SkillGroupsEditor::class)->name('skills.groups');

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/projects', ProjectsEditor::class)->name('projects');

    /*
    |--------------------------------------------------------------------------
    | Experience
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/experiences', ExperiencesEditor::class)->name('experiences');

    /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/posts', PostsEditor::class)->name('posts');
    Route::get('/posts/categories', PostCategoriesEditor::class)->name('posts.categories');

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    */

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

});
