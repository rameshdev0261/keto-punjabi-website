<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dashboard;
use App\Models\GeneralSetting;
use App\Models\PopularRecipe;
use App\Models\Product;
use App\Models\ProductRecipeRelation;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // Landing Page
    public function landing()
    {
        $data = Dashboard::all()->toArray();
        $dashboard = [];
        foreach ($data as $key => $val) {
            $dashboard[$val['key']] = $val['value'];
        }
        $cats = Category::select('name', 'icon', 'id')->get();
        $latestRecipes = Recipe::latest()->limit(7)->get();
        $products = Product::latest()->limit(5)->get();
        $owner_box = GeneralSetting::whereIn('key', [
            'home_info_image',
            'home_info_title',
            'home_info_about',
            'about_owner_name',
            'keto_diet_description',
            'my_recipe_description',
        ])->select('key', 'value')->get();
        $box = [];
        foreach ($owner_box as $key => $ob) {
            if($ob->key=='keto_diet_description'||$ob->key=='my_recipe_description'){
                $dashboard[$ob->key] = $ob->value;
            }else{
                $box[$ob->key] = $ob->value;
            }
        }
        $dashboard['owner_box'] = $box;
        $data = [
            'dashboard' => $dashboard,
            'cats' => $cats,
            'latest_recipes' => $latestRecipes,
            'products' => $products,

        ];
        return view('frontend.landing', $data);
    }

    // About Page
    public function about()
    {
        return view('frontend.about');
    }

    // Contact Us Page
    public function contactUs()
    {
        return view('frontend.contact');
    }

    // Single Recipe Page
    public function recipe(Request $request)
    {
        $id = $request->id;
        $recipe = Recipe::where('id', $id)->with(
            "nutritions",
            "ingredients",
            "directions"
        )->first();

        $products = Product::all();

        return view('frontend.single_recipe', [
            'recipe' => $recipe,
            'products' => $products
        ]);
    }

    // All Recipes Page
    public function allRecipes(Request $request)
    {
        return view('frontend.all_recipes');
    }

    // All Product Page
    public function allProducts()
    {
        return view('frontend.all_products');
    }

    // Terms & Conditions Page
    public function terms()
    {
        return view('frontend.terms');
    }

    // Terms & Conditions Page
    public function privacy()
    {
        return view('frontend.privacy');
    }

    // Blog
    public function blog()
    {
        return view('frontend.blog');
    }


    // Admin
    public function admin()
    {
        return view('admin.admin');
    }
}
