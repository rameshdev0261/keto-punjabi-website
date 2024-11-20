<?php

use Illuminate\Support\Facades\Storage;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\Facades\MediaUploader;
use Plank\Mediable\Media;

function uploadAttachment($file, $path)
{

    try {
        $media = MediaUploader::fromSource($file)
            ->toDestination('public', $path)
            ->upload();
        return $media;
    } catch (MediaUploadException $e) {
        dd($e->getMessage());
        return false;
    };
}

function downloadAttachment($id)
{
    // dd(storage_path('app\public'));
    dd(Media::find($id)->getUrl());
}
