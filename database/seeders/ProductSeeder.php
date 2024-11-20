<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $products =  [
            [
                "image" => "https://m.media-amazon.com/images/I/51ZnJyJ2R9S._SL1200_.jpg",
                "title" => "Cold Pressed Coconut Oil",
                "link" => "https://amzn.to/3Dxcm9G"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/711CN1rkxIL._SL1500_.jpg",
                "title" => "100% Cold Pressed Extra Virgin Olive Oil",
                "link" => "https://amzn.to/3EyIdbj"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/61CC08vnE0L.jpg",
                "title" => "Omega 3 Fish Oil Capsules ",
                "link" => "https://amzn.to/3EFpU4m"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/51UNTbUZncL._SL1024_.jpg",
                "title" => "The Heavy Duty Mixer Grinder to make KETOPUNJABI Lassi",
                "link" => "https://amzn.to/31tHqKe"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/61nqlLPoNEL._SL1500_.jpg",
                "title" => "ORGANIC APPLE CIDER VINEGAR PLEASE CLICK THE LIN",
                "link" => "https://amzn.to/3rAzphk"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71Pel+Drz+L._SL1500_.jpg",
                "title" => "Heavy Duty Pre-Seasoned Cast Iron Pan ",
                "link" => "https://amzn.to/31uWiI8"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71wo7y6bORL._SL1500_.jpg",
                "title" => "Heavy Duty Pre-Seasoned Cast Iron Kadai ",
                "link" => "https://amzn.to/3xXAyAE"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71YaWHLHM6L._SL1500_.jpg",
                "title" => "Desiccated Coconut Powder (1 Kg) ",
                "link" => "https://amzn.to/3oo4sLf"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71kjnwZl2oL._SL1500_.jpg",
                "title" => "Keto Coconut Flour (1Kg) ( Ultra Low Carb Coconut Flour ",
                "link" => "https://amzn.to/3lCVmbN"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/61tHakcms6L._SL1500_.jpg",
                "title" => "Sharrets KETO Electrolytes Supplement, 120 Vegan Capsules ",
                "link" => "https://amzn.to/3Gkfzv7"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71FSi6QKcZL._SL1500_.jpg",
                "title" => "INLIFE Prebiotics and Probiotics Supplement for Men Women - 60 Capsules ",
                "link" => "https://amzn.to/3dClrnf"
            ],

            [
                "image" => "https://m.media-amazon.com/images/I/71hjXXzWGzL._SL1500_.jpg",
                "title" => "Urban Platter Unfortified Yeast Flakes, 100g ",
                "link" => "https://amzn.to/32VtIjP"
            ],


        ];
        foreach ($products as $key => $prod) {
            Product::updateOrCreate($prod);
        }
    }
}
