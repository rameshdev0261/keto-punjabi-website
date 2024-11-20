<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends ResponseController
{
    public function index()
    {
        $data = Category::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(CategoryRequest $request)
    {
        Category::create(
            [
                'name' => $request->name,
                'icon' => $request->icon
            ]
        );
        return $this->actionSuccess("Created successfully",  Category::all());
    }

    public function edit(CategoryRequest $request)
    {
        Category::where('id', $request->id)->update(
            [
                'name' => $request->name,
                'icon' => $request->icon
            ]
        );
        return $this->actionSuccess("Editing Successfull",  Category::all());
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  Category::all());
    }
}
