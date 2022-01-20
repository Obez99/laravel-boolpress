<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesList = [
            [
                "name" => "Cucina",
                "color" => "#fcba03"
            ],
            [
                "name" => "Musica",
                "color" => "##a503fc"
            ],
            [
                "name" => "Informatica",
                "color" => "#2c2933"
            ],
            [
                "name" => "Notizie",
                "color" => "#c2235d"
            ],
            [
                "name" => "Attualità",
                "color" => "#3167bd"
            ],
        ];

        foreach ($categoriesList as $category) {
            $newCategory = new Category();
            $newCategory->name = $category["name"];
            $newCategory->color = $category["color"];
            $newCategory->save();
        }
    }
}
