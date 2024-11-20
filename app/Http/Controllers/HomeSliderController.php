<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\HomeSliderRequest;
use App\Models\HomeSlider;

class HomeSliderController extends ResponseController
{
    public function index()
    {
        $data = HomeSlider::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(HomeSliderRequest $request)
    {

        $media = uploadAttachment($request->file, "HomeSliders");
            HomeSlider::create(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'video_link' => $request->video_link,
                    'image' => $media->getUrl()
                ]
            );
        return $this->actionSuccess("Created successfully",  HomeSlider::all());
    }

    public function edit(HomeSliderRequest $request)
    {

        $update = [
            'title' => $request->title,
            'video_link' => $request->video_link,
            'content' => $request->content,
        ];
        if ($request->has('file')) {
            $media = uploadAttachment($request->file, "HomeSliders");
            $update['image'] = $media->getUrl();
        }

        HomeSlider::where('id', $request->id)->update(
            $update
        );

        return $this->actionSuccess("Editing Successfull",  HomeSlider::all());
    }

    public function destroy($id)
    {
        HomeSlider::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  HomeSlider::all());
    }
}
