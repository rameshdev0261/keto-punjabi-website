<?php

namespace Database\Seeders;

use App\Models\Dashboard;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = [
            [
                'key' => 'banner_image',
                'value' => 'https://images.pexels.com/photos/5463890/pexels-photo-5463890.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
            ],
            [
                'key' => 'video_link',
                'value' => 'https://www.youtube.com/embed/BHACKCNDMW8'
            ],
            [
                'key' => 'keto_diet_description',
                'value' => 'The ketogenic diet is a high-fat, adequate-protein, low-carbohydrate diet that in medicine is used mainly to treat hard-to-control epilepsy in children. The diet forces the body to burn fats rather than carbohydrates.'
            ],
            [
                'key' => 'my_recipe_description',
                'value' => ' Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Vero modi error quasi fugit debitis quidem alias fuga ipsum.
                Incidunt tenetur dignissimos porro aliquid alias nesciunt
                deserunt eius ad fuga quis?'
            ]
        ];

        foreach ($keys as $key => $value) {
            Dashboard::updateOrCreate($value);
        }
    }
}
