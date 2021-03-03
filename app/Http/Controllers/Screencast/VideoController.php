<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create(Playlist $playlist)
    {
        return view('videos.create', [
            'playlist' => $playlist,
            'title' => "New video: {$playlist->name}",
            'header' => "Add new video: {$playlist->name}",
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist)
    {
    }
}
