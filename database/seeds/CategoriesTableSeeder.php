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
                "color" => "#fcba03",
                "image" => "https://www.cafeteatro.eu/wp-content/uploads/bfi_thumb/Intervista-Chef-33nr0y1tjbu1b5ht6b14hs.jpg"
            ],
            [
                "name" => "Musica",
                "color" => "#a503fc",
                "image" => "https://www.albumnews.net/wp-content/uploads/2020/09/adesivi-disegno-di-musica-astratto-per-uso-come-sfondo.jpg-678x381.jpg"
            ],
            [
                "name" => "Informatica",
                "color" => "#2c2933",
                "image" => "https://imgcdn.agendadigitale.eu/wp-content/uploads/2018/09/17110829/coding1-e1537175323752.jpg"
            ],
            [
                "name" => "Notizie",
                "color" => "#c2235d",
                "image" => "http://www.abbaermanno.com/wp-content/uploads/2020/12/breaking-news-blog-1138x658-1.jpg"
            ],
            [
                "name" => "Attualità",
                "color" => "#3167bd",
                "image" => "https://www.sololibri.net/local/cache-gd2/1b/070106864f15e4a120820f905380fc.jpg?1621456122"
            ],
        ];

        foreach ($categoriesList as $category) {
            $newCategory = new Category();
            $newCategory->name = $category["name"];
            $newCategory->color = $category["color"];
            $newCategory->image = $category["image"];
            $newCategory->save();
        }
    }
}
