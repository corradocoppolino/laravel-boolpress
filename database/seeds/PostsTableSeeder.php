<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

            $new_post = new Post();
            $new_post->title = "Titolo post ".($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = "Questo è il post numero ".($i + 1);
            $new_post->save();

            /* $table->string('title');
            $table->string('slug');
            $table->text('content'); */

        }
    }
}
