<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class ApiController extends  Controller {

    public function index(Request $request, $handle) {
      $twitterKEY     = env('TWITTER_API_KEY');
      $twitterSecret  = env('TWITTER_API_SECRET');
      $connection = new TwitterOAuth($twitterKEY,$twitterSecret);
      $connection->setTimeouts(30,30);
      $profile = $connection->get('users/show',['screen_name' => $handle, 'include_entities' => false]);
      return response()->json($profile);
    }
}
