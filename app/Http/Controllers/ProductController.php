<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends ResponseController
{
    public function index()
    {
        $data = Product::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(ProductRequest $request)
    {
        if ($request->has('image_link')) {
            $url = $request->image_link;
        } else {
            $media = uploadAttachment($request->file, "products");
            $url = $media->getUrl();
        }
        Product::create(
            [
                'title' => $request->title,
                'link' => $request->link,
                'image' => $url
            ]
        );
        return $this->actionSuccess("Created successfully",  Product::all());
    }

    public function edit(ProductRequest $request)
    {

        $update = [
            'title' => $request->title,
            'link' => $request->link,
        ];
        if ($request->has('image_link')) {
            $update['image'] = $request->image_link;
        } else if ($request->has('file')) {
            $media = uploadAttachment($request->file, "products");
            $update['image'] = $media->getUrl();
        }

        Product::where('id', $request->id)->update(
            $update
        );

        return $this->actionSuccess("Editing Successfull",  Product::all());
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  Product::all());
    }
}
