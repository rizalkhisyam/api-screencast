<?php

namespace App\Http\Controllers\Screencast;

use Illuminate\Support\Str;
use App\Models\Screencast\Video;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authorize;

class VideoController extends Controller
{
    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);
        return view('videos.create', [
            'playlist' => $playlist,
            'title' => "New video: {$playlist->name}",
            'header' => "Add new video: {$playlist->name}",
            'video' => new Video(),
        ]);
    }

    public function store(VideoRequest $request, Playlist $playlist)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;

        $playlist->videos()->create($attr);

        return back();
    }

    public function table(Playlist $playlist)
    {
        $this->authorize('update', $playlist);
        return view('videos.table', [
            'title' => "Table of {$playlist->name} content",
            'playlist' => $playlist,
            'videos' => $playlist->videos()->orderBy('episode')->paginate(10),
        ]);
    }

    public function edit(Playlist $playlist, Video $video)
    {
        return view('videos.edit', [
            'playlist' => $playlist,
            'video' => $video,
            'title' => "Edit video: {$playlist->name} - {$video->title}"
        ]);
    }

    public function update(VideoRequest $request, Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);
        $attr = $request->all();

        $attr['intro'] = $request->intro ? true : false;
        $video->update($attr);

        return redirect(route('videos.table', $playlist->slug));
    }

    public function destroy(Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);
        $video->delete();

        return redirect(route('videos.table', $playlist->slug));
    }
}
