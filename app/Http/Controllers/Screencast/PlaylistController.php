<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
    }

    public function table()
    {
        return view('playlists.table');
    }
}
