<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use DrewM\MailChimp\MailChimp;
use \DrewM\MailChimp\Batch;

/**
* Mail Sync Service Class
*/
class MailChimpSyncService
{

	public static function sync()
	{
		$indices = [];
		$consoleOut = [];
    $MailChimp = new MailChimp(env("MAILCHIMP_API_KEY"));
    $Batch 	   = $MailChimp->new_batch();
		$client = new Client([
		    'base_uri' => env('FIREBASE_URL')
		]);

		$promises = [
			"members" => $client->getAsync("members_page/members.json"),
			"events" 	=> $client->getAsync("events.json")
		];

		//Fetch data from firebase
		$results = Promise\settle($promises)->wait();
		foreach($results as $key => $result){
			if($result['state'] == "fulfilled"){
				$response = $result['value'];
				$indices[$key] = json_decode($response->getBody()->getContents(), true);
			}else {
				$consoleOut[$key] = [
						"status" => "failed",
						"message" => "Unable to fetch firebase data"
					];
			}
		}

    $emails = [];
		foreach($indices as $key => $data){
			$temp = [];
			if ($data) {
        if($key == 'members'){

          $temp = array_column($data, 'email');
          $emails = array_merge($emails, $temp);

        }else if($key == 'events'){

  	      foreach ($data as $row)
  	      {
  	      	$temp[] = array_column(array_get($data, 'attendees', []), 'email');
  	      }
          $emails = array_merge($emails, array_flatten($temp));
        }
	    }
			$consoleOut[$key] = [
				"status" => "success",
				"message" => "Finshed Indexing"
				];
		}

    // dd($emails);
		return $consoleOut;
	}
}
