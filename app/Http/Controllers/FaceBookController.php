<?php

namespace App\Http\Controllers;

use App\FaceBook;
use App\FacebookConnection\FacebookSDK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaceBookController extends Controller
{
    public function getPosts()
    {
        $accessToken = Auth::user()->facebook->token;

        $path = 'me/posts?fields=full_picture,message,shares';

        $res = FacebookSDK::sdkConnect($accessToken, $path);

        return response()->json(json_decode($res->getBody()));
    }

    public function me()
    {
        $accessToken = Auth::user()->facebook->token;

        $path = 'me';

        $res = FacebookSDK::sdkConnect($accessToken, $path);

        return response()->json(json_decode($res->getBody()));
    }


}
