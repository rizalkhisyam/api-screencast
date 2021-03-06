<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Order\CartController;
use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Screencast\VideoController;
use App\Http\Controllers\Screencast\PlaylistController;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('playlists')->group(function () {
    Route::get('', [PlaylistController::class, 'index']);
    Route::get('{playlist:slug}', [PlaylistController::class, 'show']);

    Route::get('{playlist:slug}/videos', [VideoController::class, 'index']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', MeController::class);
    Route::get('playlist/{playlist:slug}/{video:episode}', [VideoController::class, 'show']);

    Route::get('carts', [CartController::class, 'index']);
    Route::post('add-to-cart/{playlist:slug}', [CartController::class, 'store']);

    Route::post('orders/create', [OrderController::class, 'store']);
});

Route::post('notification-handler', [OrderController::class, 'notificationHandler']);
