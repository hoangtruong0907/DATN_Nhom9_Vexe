<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Blog::create([
            'title' => 'First Blog Post',
            'content' => 'This is the content of the first blog post.',
            'tag' => 'Introduction',
            'author_id' => 1,
        ]);

        Blog::create([
            'title' => 'Second Blog Post',
            'content' => 'This is the content of the second blog post.',
            'tag' => 'News',
            'author_id' => 1,
        ]);
    }
}
