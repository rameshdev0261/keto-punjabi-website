<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends ResponseController
{
    public function index()
    {
        $data = $this->toMap();
        return $this->actionSuccess("Success", $data);
    }

    public function create(Request $request)
    {

        $requestKeys = collect($request->all())->keys();
        foreach ($requestKeys as $key) {

            if (is_file($request[$key])) {
                $media = uploadAttachment($request[$key], "Settings");
                $value = $media->getUrl();
            } else {
                $value = $request[$key];
            }
if($value)
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return $this->actionSuccess("Created successfully",  $this->toMap());
    }

    public function toMap()
    {
        $settings = GeneralSetting::all();
        $data = array();
        foreach ($settings as $setting) {
            $data[$setting->key] = $setting->value;
        }

        return $data;
    }
}
