<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Screencast\{PlaylistController, TagController, VideoController};
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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('playlists')->middleware('permission:create playlists')->group(function () {
        Route::get('create', [PlaylistController::class, 'create'])->name('playlists.create');
        Route::post('create', [PlaylistController::class, 'store']);

        Route::get('{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
        Route::put('{playlist:slug}/edit', [PlaylistController::class, 'update']);
        Route::delete('{playlist:slug}/delete', [PlaylistController::class, 'destroy'])->name('playlists.delete');


        Route::get('table', [PlaylistController::class, 'table'])->name('playlists.table');
    });
});

Route::prefix('tags')->group(function () {

    Route::middleware('permission:create tags')->group(function () {
        Route::get('create', [TagController::class, 'create'])->name('tags.create');
        Route::get('table', [TagController::class, 'table'])->name('tags.table');
        Route::post('create', [TagController::class, 'store']);
    });

    Route::middleware(['permission:delete tags', 'permission:edit tags'])->group(function () {
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('{tag:slug}/edit', [TagController::class, 'update']);
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->middleware('permission:delete tags')->name('tags.delete');
    });
});

Route::prefix('videos')->middleware('permission:create playlists')->group(function () {
    Route::get('create/into/{playlist:slug}', [VideoController::class, 'create'])->name('videos.create');
    Route::post('create/into/{playlist:slug}', [VideoController::class, 'store']);
});

require __DIR__ . '/auth.php';
