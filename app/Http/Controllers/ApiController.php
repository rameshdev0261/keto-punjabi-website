<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\PopularProduct;
use App\Models\PopularRecipe;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends ResponseController
{
    public function getNavbarItems(Request $request)
    {
        $popularRecipes = Recipe::latest()->limit(6)->get();

        $popularProducts = Product::latest()->limit(6)->get();


        return [
            'popular_recipes' => $popularRecipes,
            'products' => $popularProducts
        ];
    }

    public function getSubCount(Request $request)
    {
        $info = [
            "viewCount" => "0",
            "subscriberCount" => "0",
            "hiddenSubscriberCount" => false,
            "videoCount" => "0",
        ];
        $apiKey = 'AIzaSyAUGv_Fzof55TkQDh4ZQFuptv9Rn0VJ9rA';
        $channelId = 'UC6TF3Az8qnVIUzlOiPHBjEg';
        $url = "https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2Cstatistics&id={$channelId}&key={$apiKey}";
        $data = Http::get($url)->json();
        if ($data) {
            foreach ($data['items'] as $key => $value) {
                $statistics = $value['statistics'];
                $info = [
                    "viewCount" => number_format($statistics['viewCount']/1000000,1).'M',
                    "subscriberCount" => number_format($statistics['subscriberCount']/1000,1).'k',
                    "hiddenSubscriberCount" => $statistics['hiddenSubscriberCount'],
                    "videoCount" => $statistics['videoCount'],
                ];
            }
        }
        return $this->actionSuccess("Success", $info);
    }

    public function getSocialLinks(Request $request)
    {
        $data = GeneralSetting::whereIn('key',[
            "facebook_link",
            "instagram_link",
            "twitter_link",
            "youtube_link",
            "pinterest_link",
        ])->select('key','value')->get();
        $result=[];
        foreach ($data as $key => $value) {
            $result[$value->key] = $value->value;
        }
        return $this->actionSuccess('Success',$result);
    }


    public function getContactUsData(Request $request)
    {
        $data = GeneralSetting::whereIn('key',[
            "about_address",
            "about_contact",
            "about_email",
            "contact_us_desc",
        ])->select('key','value')->get();
        $result=[];
        foreach ($data as $key => $value) {
            $result[$value->key] = $value->value;
        }
        return $this->actionSuccess('Success',$result);
    }

    public function uploadFile(Request $request)
    {
        uploadAttachment($request->file, 'uploads');
    }
    public function test()
    {
        $id = 4;
        downloadAttachment($id);
    }
}
