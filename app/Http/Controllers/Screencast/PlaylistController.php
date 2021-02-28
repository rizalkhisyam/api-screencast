<?php

namespace App\Http\Controllers\Screencast;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create', [
            'playlist' => new Playlist()
        ]);
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);
        return view('playlists.table', compact('playlists'));
    }

    public function store(PlaylistRequest $request)
    {

        Auth::user()->playlists()->create([
            'name' => $request->name,
            'thumbnail' => $request->file('thumbnail')->store('images/playlist'),
            'slug' => Str::slug($request->name . '-' . Str::random(6)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back();
    }

    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', [
            'playlist' => $playlist
        ]);
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {

        if ($request->thumbnail) {
            Storage::delete($playlist->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('images/playlist');
        } else {
            $playlist->thumbnail;
        }

        $playlist->update([
            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect(
            route('playlists.table')
        );
    }
}
