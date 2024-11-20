<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends ResponseController
{
    public function index()
    {
        $data = Blog::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(BlogRequest $request)
    {

        $media = uploadAttachment($request->file, "blogs");
            Blog::create(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'video_link' => $request->video_link,
                    'image' => $media->getUrl()
                ]
            );
        return $this->actionSuccess("Created successfully",  Blog::all());
    }

    public function edit(BlogRequest $request)
    {

        $update = [
            'name' => $request->name,
            'video_link' => $request->video_link,
            'description' => $request->description,
        ];
        if ($request->has('file')) {
            $media = uploadAttachment($request->file, "Blogs");
            $update['image'] = $media->getUrl();
        }

        Blog::where('id', $request->id)->update(
            $update
        );

        return $this->actionSuccess("Editing Successfull",  Blog::all());
    }

    public function destroy($id)
    {
        Blog::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  Blog::all());
    }
}
