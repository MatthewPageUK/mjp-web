<?php

use App\Livewire\Cms\BulletPointsEditor;
use App\Livewire\Cms\Dashboard;
use App\Livewire\Cms\DemosEditor;
use App\Livewire\Cms\ExperiencesEditor;
use App\Livewire\Cms\MediaManager;
use App\Livewire\Cms\PostCategoriesEditor;
use App\Livewire\Cms\PostsEditor;
use App\Livewire\Cms\ProjectsEditor;
use App\Livewire\Cms\SettingsEditor;
use App\Livewire\Cms\SkillGroupsEditor;
use App\Livewire\Cms\SkillsEditor;
use App\Livewire\Cms\MessagesEditor;
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
    Route::get('/settings', SettingsEditor::class)->name('settings');

    /*
    |--------------------------------------------------------------------------
    | Media Manager
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/media', MediaManager::class)->name('media');

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/messages', MessagesEditor::class)->name('messages');


    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

});
