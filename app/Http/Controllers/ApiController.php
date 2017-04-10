<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use DrewM\MailChimp\MailChimp;
use DrewM\MailChimp\Batch;

class ApiController extends  Controller {

    public function index(Request $request, $handle) {
      $twitterKEY     = env('TWITTER_API_KEY');
      $twitterSecret  = env('TWITTER_API_SECRET');
      $connection = new TwitterOAuth($twitterKEY,$twitterSecret);
      $connection->setTimeouts(30,30);
      $profile = $connection->get('users/show',['screen_name' => $handle, 'include_entities' => false]);
      return response()->json($profile);
    }

    public function subscribe(Request $request) {

      $this->validate($request, [
        'email' => 'required|email'
      ]);
      $email = $request->email;
      $listId = env('SUBSCRIBER_LIST');
      $MailChimp = new MailChimp(env("MAILCHIMP_API_KEY"));
      $result = $MailChimp->post("lists/$listId/members", [
        'email_address' => $email,
        'status' => 'subscribed'
      ]);
      return response()->json($result);
    }
}
