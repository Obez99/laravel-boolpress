<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->words(3, true);
            $newPost->content = $faker->paragraph();
            $newPost->slug = Str::slug($newPost->title);
            $randomNumber = rand(1000, 9999);
            $newPost->slug .= "-" . $randomNumber;
            $newPost->user_id = 1;
            $newPost->category_id = rand(1, 5);

            $newPost->save();
        }
    }
}
