<?php

use App\Http\Controllers\Screencast\PlaylistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('playlists')->group(function () {
    Route::get('', [PlaylistController::class, 'index']);
});
