<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminFeatureController;
use App\Http\Controllers\AdminIssueController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::get('/features', [GeneralController::class, 'features'])->name('features');
Route::get('/singles', [GeneralController::class, 'singles'])->name('singles');
Route::get('/stories', [GeneralController::class, 'stories'])->name('stories');
Route::get('/issues', [GeneralController::class, 'issues'])->name('issues');
Route::get('/singleissue', [GeneralController::class, 'singleissue'])->name('singleissue');
Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/stories/{id}',  [GeneralController::class, 'editS'])->name('storiesM.edit');
Route::get('/issuesPage/{issuesPage}',  [GeneralController::class, 'editI'])->name('issuesPage.edit');
Route::get('/shop', [GeneralController::class, 'shop'])->name('shop');

Route::post('/mailing-list/subscribe', [SubscribeController::class, 'subscribe']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('admin')->group(function () {
    Route::get('/adminHome', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::patch('/home_issues/{id}', [AdminHomeController::class, 'update'])->name('home_issues.update');
    Route::patch('/home_videos/{id}', [AdminHomeController::class, 'updateVideo'])->name('home_videos.update');
    Route::patch('/home_gallerys/{id}', [AdminHomeController::class, 'updateGallery'])->name('home_gallerys.update');
    Route::patch('/home_parallaxs/{id}', [AdminHomeController::class, 'updateParallax'])->name('home_parallaxs.update');
    Route::post('/GalleryImage', [AdminHomeController::class, 'storeImage'])->name('GalleryImage.store');
    Route::delete('/galleryDelete/{id}', [AdminHomeController::class, 'destroyGallery'])->name('galleryDelete.destroy');

    Route::get('/adminFeature', [AdminFeatureController::class, 'index'])->name('admin.feature');
    Route::post('/features', [AdminFeatureController::class, 'store'])->name('features.store');
    Route::post('/featuresImage', [AdminFeatureController::class, 'storeImage'])->name('featuresImage.store');
    Route::post('/featuresVideo', [AdminFeatureController::class, 'storeVideos'])->name('featuresVideo.store');
    Route::get('/features/{id}',  [AdminFeatureController::class, 'edit'])->name('features.edit');
    Route::patch('/features/{id}', [AdminFeatureController::class, 'update'])->name('features.update');
    Route::patch('/featuresImages/{id}', [AdminFeatureController::class, 'updateImages'])->name('featuresImages.update');
    Route::patch('/featuresVideo/{id}', [AdminFeatureController::class, 'updateVideos'])->name('featuresVideos.update');
    Route::delete('/features/{id}', [AdminFeatureController::class, 'destroy'])->name('features.destroy');
    Route::delete('/featuresDelete/{id}', [AdminFeatureController::class, 'destroyImage'])->name('featuresDelete.destroy');
    Route::delete('/featuresVideoDelete/{id}', [AdminFeatureController::class, 'destroyVideo'])->name('featuresVideoDelete.destroy');


    Route::get('/adminIssue', [AdminIssueController::class, 'index'])->name('admin.issues');
    Route::post('/issues', [AdminIssueController::class, 'store'])->name('issues.store');
    Route::get('/issues/{id}',  [AdminIssueController::class, 'edit'])->name('issues.edit');
    Route::patch('/issues/{id}', [AdminIssueController::class, 'update'])->name('issues.update');
    Route::post('/issuesImage', [AdminIssueController::class, 'storeImage'])->name('issuesImage.store');
    Route::patch('/issuesImage/{id}', [AdminIssueController::class, 'updateImages'])->name('issuesImage.update');
    Route::delete('/issues/{id}', [AdminIssueController::class, 'destroy'])->name('issues.destroy');
    Route::delete('/issuesDelete/{id}', [AdminIssueController::class, 'destroyImage'])->name('issuesDelete.destroy');

    Route::get('/adminAbout', [AdminAboutController::class, 'index'])->name('admin.about');
    Route::patch('/aboutUs/{id}', [AdminAboutController::class, 'update'])->name('aboutUs.update');
    Route::post('/teams', [AdminAboutController::class, 'store'])->name('teams.store');
    Route::patch('/teams/{id}', [AdminAboutController::class, 'teamupdate'])->name('teams.update');
    Route::delete('/teamDelete/{id}', [AdminAboutController::class, 'destroyTeam'])->name('teamDelete.destroy');
    Route::patch('/editors/{id}', [AdminAboutController::class, 'editorupdate'])->name('editors.update');



    Route::get('/adminClub', [AdminClubController::class, 'index'])->name('admin.club');
    Route::post('/clubUpdates', [AdminClubController::class, 'store'])->name('clubUpdates.store');
    Route::get('/clubUpdates/{id}',  [AdminClubController::class, 'edit'])->name('clubUpdates.edit');
    Route::patch('/clubUpdates/{id}', [AdminClubController::class, 'update'])->name('clubUpdates.update');
    Route::delete('/clubUpdates/{id}', [AdminClubController::class, 'destroy'])->name('clubUpdates.destroy');
});




require __DIR__.'/auth.php';
