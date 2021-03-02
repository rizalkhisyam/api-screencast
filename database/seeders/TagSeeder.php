<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Screencast\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'Javascript', 'Java', 'HTML', 'PHP', 'CSS', 'Tailwind CSS', 'Laravel', 'Lumen', 'React JS', 'Flutter', 'Dart', 'Ruby', 'Assembly'
        ]);

        $tags->each(function ($tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        });
    }
}
