<?php

namespace App\Policies\Screencast;

use App\Models\User;
use App\Models\Screencast\Playlist;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlaylistPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function update(User $user, Playlist $playlist)
    {
        return $user->id === $playlist->user_id;
    }
}
