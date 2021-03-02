<?php

namespace App\Models\Screencast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail', 'slug', 'description', 'price'];

    public function getPictureAttribute()
    {
        return asset('storage/' . $this->thumbnail);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
