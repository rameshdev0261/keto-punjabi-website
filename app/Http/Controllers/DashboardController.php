<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;

class DashboardController extends ResponseController
{
    public function index()
    {
        $data['total_recipes'] = Recipe::count();
        $data['total_products'] = Product::count();
        $data['total_blogs'] = Blog::count();
        return $this->actionSuccess('Success', $data);
    }
}
