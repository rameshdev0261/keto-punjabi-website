<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\TagsRequest;
use App\Models\Tags;

class TagsController extends ResponseController
{
    public function index()
    {
        $data = Tags::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(TagsRequest $request)
    {
        Tags::create(
            [
                "name" => $request->name,
                "icon" => $request->icon,
            ]
        );
        return $this->actionSuccess("Created successfully",  Tags::all());
    }

    public function edit(TagsRequest $request)
    {
        Tags::where('id', $request->id)->update(
            [
                "name" => $request->name,
                "icon" => $request->icon,
            ]
        );
        return $this->actionSuccess("Editing Successfull",  Tags::all());
    }

    public function destroy($id)
    {
        Tags::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  Tags::all());
    }
}
