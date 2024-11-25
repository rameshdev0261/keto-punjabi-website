<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\RecipeRequest;
use App\Models\Category;
use App\Models\Direction;
use App\Models\Ingredient;
use App\Models\Nutrition;
use App\Models\Recipe;
use App\Models\RecipeTag;
use App\Models\Tags;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class RecipeController extends ResponseController {
    public function index() {
        $data = Recipe::all();
        return $this->actionSuccess( 'Success', $data );
    }

    public function create( RecipeRequest $request ) {
        $media = uploadAttachment( $request->file, 'recipes' );

        $recipe = Recipe::create(
            [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'thumbnail' => $media->getUrl(),
                'video_link' => $request->video_link,
                'difficulty' => $request->difficulty,
                'diet_type' => $request->diet_type,
                'category' => $request->category ?? '',
                'category_id' => $request->category_id,
                'prep_time' => $request->prep_time ?? 1,
            ]
        );

        $this->storeTags( $request, $recipe->id );
        $this->storeNutritions( $request, $recipe->id );
        $this->storeIngredients( $request, $recipe->id );
        $this->storeDirections( $request, $recipe->id );

        return $this->actionSuccess( 'Created successfully',  Recipe::all() );
    }

    public function show( $id ) {
        $data = Recipe::where( 'id', $id )->with( [
            'nutritions',
            'ingredients',
            'directions',
            'tags'
        ] )->first();

        return $this->actionSuccess( 'deleted Successfull',  $data );
    }

    public function edit( RecipeRequest $request ) {
        $update = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'video_link' => $request->video_link,
            'difficulty' => $request->difficulty,
            'diet_type' => $request->diet_type,
            'category' => Category::where( 'id', $request->category_id )->pluck( 'name' )->first() ?? '',
            'category_id' => $request->category_id,
            'prep_time' => $request->prep_time ?? 1,
        ];

        if ( $request->has( 'file' ) ) {
            $media = uploadAttachment( $request->file, 'products' );
            $update[ 'thumbnail' ] = $media->getUrl();
        }

        Recipe::where( 'id', $request->id )->update(
            $update
        );

        $this->storeTags( $request, $request->id );
        $this->storeNutritions( $request, $request->id );
        $this->storeIngredients( $request, $request->id );
        $this->storeDirections( $request, $request->id );

        return $this->actionSuccess( 'Editing Successfull',  Recipe::all() );
    }

    public function destroy( $id ) {
        Recipe::where( 'id', $id )->delete();
        return $this->actionSuccess( 'deleted Successfull',  Recipe::all() );
    }

    private function storeTags( $request, $recipe_id ) {
        RecipeTag::where( 'recipe_id', $recipe_id )->delete();
        $tags = json_decode( $request->tags );
        foreach ( $tags as $tag ) {
            $store[ 'tag_id' ] = $tag;
            $store[ 'tag' ] = Tags::where( 'id', $tag )->pluck( 'name' )->first() ?? '';
            $store[ 'recipe_id' ] = $recipe_id;
            RecipeTag::create( $store );
        }
    }

    private function storeNutritions( $request, $recipe_id ) {
        Nutrition::where( 'recipe_id', $recipe_id )->delete();
        $nutritions = json_decode( $request->nutritions );
        foreach ( $nutritions as $nutrition ) {
            $store = ( array ) $nutrition;
            $store[ 'recipe_id' ] = $recipe_id;
            Nutrition::create( $store );
        }
    }

    private function storeIngredients( $request, $recipe_id ) {

        Ingredient::where( 'recipe_id', $recipe_id )->delete();
        $ingredients = json_decode( $request->ingredients );
        foreach ( $ingredients as $ingredient ) {
            $store = ( array ) $ingredient;
            $store[ 'recipe_id' ] = $recipe_id;
            Ingredient::create( $store );
        }
    }

    private function storeDirections( $request, $recipe_id ) {
        Direction::where( 'recipe_id', $recipe_id )->delete();
        $directions = json_decode( $request->directions );
        foreach ( $directions as $direction ) {
            $store = ( array )$direction;
            $store[ 'recipe_id' ] = $recipe_id;
            Direction::create( $store );
        }
    }

    public function search_recipes( Request $request ) {
        $query = Recipe::query();
        $query->where( 'title', 'like', "%$request->search_text%" );
        if ( $request->category_id ) {
            $query->where( 'category_id', $request->category_id );
        }
        if ( $request->diet_types ) {
            $query->where( 'diet_type', $request->diet_types );
        }
        $data = $query->get();
        return $this->actionSuccess( 'Success', $data );
    }

    public function filter_recipes( Request $request ) {
        $query = Recipe::query();

        if ( $request->category_ids ) {
            $query->whereIn( 'category_id', $request->category_ids );
        }

        $data = $query->paginate( 7 );
        return $this->actionSuccess( 'Success', $data );
    }

}
