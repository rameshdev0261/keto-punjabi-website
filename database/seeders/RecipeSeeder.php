<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Direction;
use App\Models\Ingredient;
use App\Models\Nutrition;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->recipeData();

        $cats = [
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/tableware.png",
                'name' => "Main Dishes"
            ],
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/rice-bowl.png",
                'name' => "Side Dishes"
            ],
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/eggs.png",
                'name' => "Breakfast"
            ],
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/french-fries.png",
                'name' => "Snacks"
            ],
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/kawaii-cupcake.png",
                'name' => "Deserts"
            ],
            [
                'icon' => "https://img.icons8.com/ios-filled/50/000000/coffee-to-go.png",
                'name' => "Beverages"
            ],
        ];

        // $recipeCommon = [
        //     "short_description" => 'This Low Carb Mexican Cauliflower Rice recipe is vegetarian and loaded with flavor. It\'s a great Keto side dish!',
        //     "video_link" => 'https://www.youtube.com/embed/PrvGl5FZT8U',
        //     "diet_type" => 'Vegetarian',
        //     "prep_time" => '15',
        //     "meal" => 'Breakfast',
        //     "difficulty" => 'Very easy',
        // ];
        foreach ($cats as $key => $cat) {
            $category = Category::updateOrCreate($cat);
            // $recipeCat = [
            //     "category" => $category->name,
            //     "category_id" => $category->id,
            // ];

            // $recipes =  [
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_tacos_1296x728-body1.jpg",
            //         "title" => $category->name . " Low Carb Taco Night with Cheese Taco Shells",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_califlower_1296x728-body2.jpg",
            //         "title" => $category->name . " Loaded Cauliflower",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_sesame_1296x728-body3.jpg",
            //         "title" => $category->name . " Low Carb Sesame Chicken",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_pork_1296x728-body4.jpg",
            //         "title" => $category->name . " Thai BBQ Pork Salad",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_wasabi_1296x728-body5.jpg",
            //         "title" => $category->name . " Salmon Wasabi Burgers",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_potpie_1296x728-body6.jpg",
            //         "title" => $category->name . " Keto Chicken Pot Pie",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_relleno_1296x728-body6.jpg",
            //         "title" => $category->name . " Colombian-Style Zucchini Rellenos",

            //     ],
            //     [
            //         "thumbnail" => "https://images-prod.healthline.com/hlcmsresource/images/Best-of-Books/3275-keto_caulirice_1296x728-body7.jpg",
            //         "title" => $category->name . " Low Carb Mexican Cauliflower Rice",

            //     ],
            // ];

            // foreach ($recipes as $key => $rec) {
            //     $recipe = Recipe::updateOrCreate(array_merge($recipeCommon, $recipeCat, $rec));
            //     $ingredients = [
            //         [
            //             "ingredient" => "Garlic Powder",
            //             "quantity" => "1 1/2 teaspoons",
            //             "recipe_id" => $recipe->id
            //         ],

            //         [
            //             "ingredient" => "Onion flakes",
            //             "quantity" => "3 teaspoons",
            //             "recipe_id" => $recipe->id
            //         ],

            //         [
            //             "ingredient" => "Pepper",
            //             "quantity" => "1/2 teaspoons",
            //             "recipe_id" => $recipe->id
            //         ],

            //         [
            //             "ingredient" => "Salt",
            //             "quantity" => "1/2 teaspoons",
            //             "recipe_id" => $recipe->id
            //         ],

            //         [
            //             "ingredient" => "Cauliflower rice",
            //             "quantity" => "2 cups",
            //             "recipe_id" => $recipe->id
            //         ],

            //         [
            //             "ingredient" => "Tomato Puree",
            //             "quantity" => "1/4 cup",
            //             "recipe_id" => $recipe->id
            //         ],
            //     ];
            //     foreach ($ingredients as $key => $ingredient) {
            //         Ingredient::updateOrCreate($ingredient);
            //     }

            //     $nutris = [
            //         [
            //             "value" => "224",
            //             "title" => "Calories",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "value" => "15.5g",
            //             "title" => "Protein",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "value" => "35.6",
            //             "title" => "Carbs",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "value" => "3.5g",
            //             "title" => "Fats",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "value" => "2.5g",
            //             "title" => "Fiber",
            //             'recipe_id' => $recipe->id
            //         ],
            //     ];

            //     foreach ($nutris as $key => $nutri) {
            //         Nutrition::updateOrCreate($nutri);
            //     }

            //     $directions = [
            //         [
            //             "step" => 1,
            //             "description" => "Place a large frying pan over medium-low heat. Add the butter, garlic powder, and onion flakes and gently sauté for 3 minutes.",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "step" => 2,
            //             "description" => "Add the cauliflower rice, salt, and pepper and sauté for 3 minutes, until the cauliflower is beginning to soften.",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "step" => 3,
            //             "description" => "Add the tomato puree and stir well. Continue to cook for another 3-5 minutes until the cauliflower is cooked through.",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "step" => 4,
            //             "description" => "Take the pan off the heat and stir through the cilantro.",
            //             'recipe_id' => $recipe->id
            //         ],

            //         [
            //             "step" => 5,
            //             "description" => "Serve and enjoy.",
            //             'recipe_id' => $recipe->id
            //         ],
            //     ];

            //     foreach ($directions as $key => $dir) {
            //         Direction::updateOrCreate($dir);
            //     }
            // }
        }
    }


    function recipeData()
{
    $recipes = [
        [
            "short_description" => 'In this video ketopunjabi dilmohanjit is sharing a best keto recipe in ketopunjabi style. this chicken recipe is heavenly delicious.',
            "video_link" => 'https://www.youtube.com/embed/U28NojVNN8U',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '20',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "GREEN CHICKEN RECIPE",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [
                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "4-5 tbsp",
                ],

                [
                    "ingredient" => "Green chilies",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic Cloves",
                    "quantity" => "12-15",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "4-5 inch",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "4-5",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "2",
                ],

                [
                    "ingredient" => "Spinach",
                    "quantity" => "3 bunch",
                ],
                [
                    "ingredient" => "Fenugreek leaves",
                    "quantity" => "1 bunch",
                ],
                [
                    "ingredient" => "Chicken leg thighs",
                    "quantity" => "1500 grms",
                ],
                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "200 ml",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this quick video ketopunjabi dilmohanjit is sharing his favourite keto recipe in ketopunjabi style. this is one of the delicious ketopunjabi recipe invented in ketopunjabi kitchen.',
            "video_link" => 'https://www.youtube.com/embed/etUBs8cHMR0',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '30',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "CHICKEN IN CABBAGE",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "4-5 tbsp",
                ],

                [
                    "ingredient" => "Garlic Cloves",
                    "quantity" => "12-15",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "3-4 inch",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "5",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "2",
                ],

                [
                    "ingredient" => "Cinnamon",
                    "quantity" => "4-5 inch",
                ],
                [
                    "ingredient" => "Cloves",
                    "quantity" => "7-8",
                ],
                [
                    "ingredient" => "Chicken drumsticks",
                    "quantity" => "1 kg",
                ],
                [
                    "ingredient" => "Cabbage",
                    "quantity" => "2 kg",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video ketopunjabi dilmohanjit is cooking kadaknaath chicken curry or desi murga curry.',
            "video_link" => 'https://www.youtube.com/embed/U7odbkBhtB0',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '40',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "CHICKEN CURRY IN KETOPUNJABI STYLE",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "4-5 tbsp",
                ],

                [
                    "ingredient" => "Garlic",
                    "quantity" => "100 gm",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "100 gm",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "6",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "6",
                ],

                [
                    "ingredient" => "Green chilies",
                    "quantity" => "10-12",
                ],
                [
                    "ingredient" => "2 kg whole Chicken (kadaknaath)",
                    "quantity" => "2 kg",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video ketopunjabi dilmohanjit is sharing a beautyful keto recipe of tava fry fish and tava fry paneer indian cottage cheese in a ketopunjabi twist.',
            "video_link" => 'https://www.youtube.com/embed/M2aL8IrojFU',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '40',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "PAN FRY FISH & PAN FRY CHEESE",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "12-15 tbsp",
                ],

                [
                    "ingredient" => "Garlic",
                    "quantity" => "100 gm",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "100 gm",
                ],

                [
                    "ingredient" => "Dried Red chilies",
                    "quantity" => "10-15",
                ],

                [
                    "ingredient" => "Cumin seeds",
                    "quantity" => "3-4 tbsp",
                ],

                [
                    "ingredient" => "Coriander seeds",
                    "quantity" => "3 tbsp",
                ],
                [
                    "ingredient" => "Carom seeds",
                    "quantity" => "2 tbsp",
                ],
                [
                    "ingredient" => "High fat paneer",
                    "quantity" => "500 grm",
                ],
                [
                    "ingredient" => "Fish",
                    "quantity" => "2 kg",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video ketopunjabi dilmohanjit is teaching a unique and tradetional ketopunjabi style to cook goat meat curry or matan curry  tari wala bakra.',
            "video_link" => 'https://www.youtube.com/embed/HVl6FSUS658',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '45',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "MATAN CURRY|TARI WALA GOSHT|TARI WALA BAKRA|RED MEAT",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic flowers",
                    "quantity" => "3-4",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "300 gm",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "1 kg",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "1 kg",
                ],


                [
                    "ingredient" => "Green chilies",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red meat of Goat",
                    "quantity" => "2 kg",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video ketopunjabi dilmohanjit is cooking chicken liver chillie recipe in ketopunjabi style. how we can cook perfect keto meal in quick and a simple way. A healthy keto recipe for healthy liver.',
            "video_link" => 'https://www.youtube.com/embed/Ff3LQ_l0eu0',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '46',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "LIVER CHILLIE & GHEE OF THE GOAT|A PERFECT KETO MEAL",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "12-15",
                ],

                [
                    "ingredient" => "Ginger jullians",
                    "quantity" => "50-80 gm",
                ],

                [
                    "ingredient" => "Onion bulbs",
                    "quantity" => "3",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "4-5",
                ],


                [
                    "ingredient" => "Green chilies",
                    "quantity" => "6-7",
                ],

                [
                    "ingredient" => "Green bell peppers",
                    "quantity" => "500 gms",
                ],

                [
                    "ingredient" => "Lard, tallow or Bacon fat",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cold pressed coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'Keto butter chicken is one of the most delicious recipes ever invented in ketopunjabi kitchen.  The great thing about this butter chicken is that it can fill you up in few bites.  The cooking process is so simple & quick which only takes less than an hour to cook.',
            "video_link" => 'https://www.youtube.com/embed/QAgzPkSEWKM',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '46',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto butter chicken mouth watering weight loss recipe",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Onions",
                    "quantity" => "1-2",
                ],

                [
                    "ingredient" => "Cucumber seeds",
                    "quantity" => "50 gms",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],


                [
                    "ingredient" => "Chicken",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Virgin coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'If you are a chicken lover then keto red chicken recipe is definitely for you to try.  This is one of the best delicious keto chicken recipes ever invented in ketopunjabi kitchen.  With very few ingredients the taste of this keto main meal is out of this world and at the same time the cooking process is so simple & quick.  All in all this is a mouthwatering weight loss dish specially recommended to keto diet lovers by our world class chef Mr. Dilmohanjit.',
            "video_link" => 'https://www.youtube.com/embed/57HqW3LS4bk',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto red chicken",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Ginger",
                    "quantity" => "3 inch",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "10-12",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],

                [
                    "ingredient" => "Chicken leg thighs",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Virgin coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'Keto chicken Mr. White is a ketopunjabis brand new delicious experiment, which broke all the previous records of taste.  This is a unique style of cooking chicken in a homemade white sauce without any special ingredients.  This white chicken is a piece of art and the taste is ultimate. The richness of chicken coated in   white sauce   makes you instantly hungry.  It is so satisfying which fills you up in few bites.  All in all, it is a perfect intermittent fasting recipe to lose excess body weight.',
            "video_link" => 'https://www.youtube.com/embed/EYt2lZ8w4Oc',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '35',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto chicken Mr white my new delicious experiment",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Ginger",
                    "quantity" => "3 inch",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "10-12",
                ],

                [
                    "ingredient" => "Chicken leg thighs",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Raw Peanuts",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Dried coconut dust",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Green chillies",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'Keto chicken in cabbage is a very special recipe without adding anything special into it.  This keto cabbage chicken is the best combination of veg and non veg foods. The taste of this chicken recipe is out of this world.  The preparation is so simple, to cook this keto chicken you only need few ingredients and less than one hour time.',
            "video_link" => 'https://www.youtube.com/embed/vm0GanKRioQ',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto chicken in cabbage",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Ginger",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cinnamon",
                    "quantity" => "2-3 inch",
                ],

                [
                    "ingredient" => "Cabbage",
                    "quantity" => "1",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "10-12",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],

                [
                    "ingredient" => "Chicken legs",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garam Masala powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Virgin coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'Keto tari chicken is a super duper delicious recipe straight coming out from ketopunjabi kitchen.  The meaning of word tari is related to gravy or soup. Tari chicken is a traditional recipe of my family. In my family chicken tari is a highlight of parties & special occasions. Once you start you litterly cannot stop eating until you are full.',
            "video_link" => 'https://www.youtube.com/embed/hEdTydWR8pI',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto Tari chicken",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Ginger",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Cinnamon cloves",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Green chillies",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "10-12",
                ],

                [
                    "ingredient" => "Chicken leg",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Green mint",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pepper corns",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Extra Virgin coconut oil",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video learn to cook ginger lemon chicken in an easy way. Ginger lemon Chicken is a all time favorit recipe of every keto lover.  This is a high fat recipe with very very low carvbohydrates.  This is a recipe with heavenly taste and texture with limited ingredients.',
            "video_link" => 'https://www.youtube.com/embed/sbgfEMq0UfE',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Easy Ginger Lemon Chicken Recipe",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [


                [
                    "ingredient" => "Chicken leg thighs",
                    "quantity" => "1-1/2",
                ],

                [
                    "ingredient" => "Chopped ginger julian",
                    "quantity" => "1-1/2",
                ],

                [
                    "ingredient" => "Lemons",
                    "quantity" => "3-4",
                ],

                [
                    "ingredient" => "Salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coconut oil",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Butter",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Thick creame",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Mozzarella or cheddar cheese",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Black pepper powder",
                    "quantity" => "2 teaspoons",
                ],

            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'Keto chicken chutney wala is a special non veg recipe for the lovely viewers of ketopunjabi channel.',
            "video_link" => 'https://www.youtube.com/embed/D8nP7uQ-J5U',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Keto chicken chutney wala",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Onions",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Green chillies",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Garlic cloves",
                    "quantity" => "10-12",
                ],

                [
                    "ingredient" => "Chicken leg",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Green mint",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Pepper corns",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Extra Virgin coconut oil",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video learn how to cook Fried Chicken KFC Style  Best Fried Chicken   Chicken Pakora recipe Keto  Fried Chicken   How to Make Spicy n Crispy  How to make KFC chicken   recipe kfc chicken  fried chicken recipe   keto  fried chicken   fried chilcken recipe ',
            "video_link" => 'https://www.youtube.com/embed/3ua_Y3fXBCA',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Fried Chicken KFC Style|Best Fried Chicken|Chicken Pakora recipe|Keto Fried Chicken",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Whole chicken",
                    "quantity" => "1 kg",
                ],

                [
                    "ingredient" => "Sesame seed flour",
                    "quantity" => "5 tbsp",
                ],

                [
                    "ingredient" => "Ginger garlic paste",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Onion powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Greek yogurt",
                    "quantity" => "2 tbsp",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Black pepper powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],
        [
            "short_description" => 'In this video learn how to cook Omelet Curry recipe  Egg recipe  Low carb recipe  Omelet recipe  Keto recipe  Authentic curry recipe  Gravy  How to make omelet curry',
            "video_link" => 'https://www.youtube.com/embed/RfIo8Xe7bcw',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Omelette Curry recipe|Egg recipe|Low carb recipe|Omelette recipe|Keto recipe|Authentic recipe|Gravy",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Whole eggs",
                    "quantity" => "8",
                ],

                [
                    "ingredient" => "Medium size onions",
                    "quantity" => "2",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],

                [
                    "ingredient" => "Chopped ginger",
                    "quantity" => "2 inch",
                ],

                [
                    "ingredient" => "Cumin seeds",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Chopped garlic",
                    "quantity" => "8-10 cloves",
                ],

                [
                    "ingredient" => "Garam masala powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Red chilli",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coconut oil",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video learn how to make Green chutney recipe',
            "video_link" => 'https://www.youtube.com/embed/B_Xs-iy_eok',
            "diet_type" => 'Vegetarian',
            "prep_time" => '20',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Green chutney recipe| How to make Green Chutney|Green Indian Sauce|Chatni|How to cook|Keto sauce|",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Mint leaves",
                    "quantity" => "2 cups",
                ],

                [
                    "ingredient" => "small onions",
                    "quantity" => "2",
                ],

                [
                    "ingredient" => "Green chilli paste",
                    "quantity" => "2 tbsp",
                ],

                [
                    "ingredient" => "White vinegar",
                    "quantity" => "2-3 tbsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video learn How to make veg smoothie How to make vegetable smoothie for weight loss',
            "video_link" => 'https://www.youtube.com/embed/CjJVDhCeFps',
            "diet_type" => 'Vegetarian',
            "prep_time" => '20',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Veg Smoothie|Weight Loss Recipe|Smoothie Recipe|Green Veg Smoothie|Keto Smoothie|High Fat Smoothie|",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Cucumber",
                    "quantity" => "250 gm",
                ],

                [
                    "ingredient" => "Cabbage",
                    "quantity" => "250 gm",
                ],

                [
                    "ingredient" => "Tomato",
                    "quantity" => "1",
                ],

                [
                    "ingredient" => "Butter",
                    "quantity" => "4-5 tbsp",
                ],

                [
                    "ingredient" => "Coconut Oil",
                    "quantity" => "6-8 tbsp",
                ],

                [
                    "ingredient" => "Apple cider vinegar",
                    "quantity" => "3-4 tbsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Water",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],
        [
            "short_description" => 'In this video learn Kaleji masala curry  chicken  liver recipe  dhaba style kaleji  kaleji best recipe  kaleji Punjabi  curry  liver curry.',
            "video_link" => 'https://www.youtube.com/embed/_gmMAWIDRFM',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '50',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Kaleji Curry|Kaleji Recipe|Chicken Liver Recipe|Keto Liver Recipe|Keto Recipe|Kaleji Ki Recipe",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Chicken Liver",
                    "quantity" => "1 kg",
                ],

                [
                    "ingredient" => "Medium size onions",
                    "quantity" => "2",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],

                [
                    "ingredient" => "Green chillies",
                    "quantity" => "6-7",
                ],

                [
                    "ingredient" => "Chopped ginger",
                    "quantity" => "2 inch",
                ],

                [
                    "ingredient" => "Chopped garlic",
                    "quantity" => "8-10 cloves",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "2 tbsp",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Garam masala",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "APT",
                ],

                [
                    "ingredient" => "Coconut Oil or Ghee Or Any Animal Fat (LARD)",
                    "quantity" => "APT",
                ],
            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ],

        [
            "short_description" => 'In this video  learn Delhi egg masala   farmers delhi anda masala   delhi masala   delhi farmers pro egg recipe  delhi egg street food.',
            "video_link" => 'https://www.youtube.com/embed/95PNYevzbb4',
            "diet_type" => 'Non-vegetarian',
            "prep_time" => '30',
            "meal" => '',
            "difficulty" => '',
            "thumbnail" => "",
            "title" => "Egg Masala|Dhaba Style Egg Masala|Farmers Anda Masala|Easy Egg Curry|Egg Recipe|Keto Recipe|Keto egg",
            "category" => "",
            "category_id" => '1',
            "ingredients" => [

                [
                    "ingredient" => "Boiled Eggs",
                    "quantity" => "5-6",
                ],

                [
                    "ingredient" => "Medium sized Onion",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Tomatoes",
                    "quantity" => "2-3",
                ],

                [
                    "ingredient" => "Chopped ginger",
                    "quantity" => "2 inch",
                ],

                [
                    "ingredient" => "Green chillies",
                    "quantity" => "4-5",
                ],

                [
                    "ingredient" => "Cumin seeds",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Garam masala",
                    "quantity" => "1 tbsp",
                ],

                [
                    "ingredient" => "Coriander powder",
                    "quantity" => "1 tpsp",
                ],

                [
                    "ingredient" => "Red chilli powder",
                    "quantity" => "1 tpsp",
                ],

                [
                    "ingredient" => "Turmeric powder",
                    "quantity" => "1 tpsp",
                ],

                [
                    "ingredient" => "Pink salt",
                    "quantity" => "1 tpsp",
                ],

                [
                    "ingredient" => "Coconut oil",
                    "quantity" => "APT",
                ],

            ],
            "directions" => [
                [
                    "step" => 1,
                    "description" => "",

                ],

                [
                    "step" => 2,
                    "description" => "",

                ],

                [
                    "step" => 3,
                    "description" => "",

                ],

                [
                    "step" => 4,
                    "description" => "",

                ],

                [
                    "step" => 5,
                    "description" => "",

                ],
            ]
        ]
    ];

    foreach ($recipes as $key => $val) {
        $recipe = [
            "short_description" =>$val['short_description'],
            "video_link" =>$val['video_link'],
            "diet_type" =>$val['diet_type'],
            "prep_time" =>$val['prep_time'],
            "meal" =>$val['meal'],
            "difficulty" =>$val['difficulty'],
            "thumbnail" =>$val['thumbnail'],
            "title" =>$val['title'],
            "category" =>"Main Dishes",
            "category_id" =>$val['category_id'],
        ];
        $recModel = Recipe::updateOrCreate($recipe);
        foreach ($val['ingredients'] as $key => $ingVal) {
            Ingredient::updateOrCreate(array_merge($ingVal,['recipe_id'=>$recModel->id]));
        }

    }
}




}
