<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsList = [
            [
                "name" => "Opinione",
                "color" => "#cc274d"
            ],
            [
                "name" => "Info",
                "color" => "#cbdb14"
            ],
            [
                "name" => "Esperienza",
                "color" => "#c215ab"
            ],
            [
                "name" => "Fai da te",
                "color" => "#e08210"
            ],
            [
                "name" => "Work in progress",
                "color" => "#5b5f75"
            ],
            [
                "name" => "Ambizioni",
                "color" => "#c90c3b"
            ],
        ];

        foreach ($tagsList as $tag) {
            $newTag = new Tag;
            $newTag->name = $tag["name"];
            $newTag->color = $tag["color"];
            $newTag->save();
        }
    }
}
