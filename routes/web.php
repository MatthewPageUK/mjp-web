<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Ui\UserDashboard;
use App\Livewire\Ui\Experience\Index as ExperienceIndex;
use App\Livewire\Ui\Experience\View as ExperienceView;
use App\Livewire\Ui\Journal\Index as JournalIndex;
use App\Livewire\Ui\Skill\Index as SkillIndex;
use App\Livewire\Ui\Skill\View as SkillView;
use App\Livewire\Ui\Demo\Index as DemoIndex;
use App\Livewire\Ui\Demo\View as DemoView;
use App\Livewire\Ui\Project\{
    Index as ProjectIndex,
    View as ProjectView,
};
use App\Livewire\Ui\Post\{
    Index as PostIndex,
    Category as PostCategory,
    View as PostView,
};
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;

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
| Journal
|--------------------------------------------------------------------------
|
*/
Route::get('/journal', JournalIndex::class)->name('journal');

/*
|--------------------------------------------------------------------------
| Library
|--------------------------------------------------------------------------
|
*/
Route::get('/library', App\Livewire\Ui\Library\Index::class)->name('library');
Route::get('/library/{book}', App\Livewire\Ui\Library\Book::class)->name('library.book');

/*
|--------------------------------------------------------------------------
| Availability
|--------------------------------------------------------------------------
|
*/
Route::get('/availability', App\Livewire\Ui\Availability\Index::class)->name('availability');

/*
|--------------------------------------------------------------------------
| Project Quote
|--------------------------------------------------------------------------
|
*/
Route::get('/quote', App\Livewire\Ui\ProjectQuote::class)->name('project-quote');

/*
|--------------------------------------------------------------------------
| CV Download
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/pdf/{cv}/download', [CvController::class, 'make'])->name('cv.pdf.download');
    Route::get('/pdf/{cv}/view', [CvController::class, 'view'])->name('cv.pdf.view');
});

/*
|--------------------------------------------------------------------------
| Stuff
|--------------------------------------------------------------------------
|
*/
Route::get('/dashboard', UserDashboard::class)->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
