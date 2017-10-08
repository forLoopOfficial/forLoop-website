<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

/**
* Search Sync Service Class
*/
class AlgoliaSyncService
{

	public static function sync()
	{
		$indices = [];
		$consoleOut = [];
		$algoClient = new \AlgoliaSearch\Client(env("ALGOLIA_APP_ID"), env("ALGOLIA_API_KEY"));
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

		foreach($indices as $key => $data){
			$index = $algoClient->initIndex($key);
			if ($data) {
	      $batch = array();
	      // iterate over results and send them by batch of 10000 elements
	      foreach ($data as $id => $row)
	      {
	      	// select the identifier of this row
          $row['objectID'] = $id;
          unset($row['attendees']);
	        array_push($batch, $row);

	        if (count($batch) == 10000)
	        {
						try{
							$index->saveObjects($batch);
						}catch(AlgoliaSearch\AlgoliaException $e){
							$consoleOut[$key] = [
									"status" => "failed",
									"message" => $e->getMessage()
								];
						}
	          $batch = array();
	        }
	      }

				try{
					$index->saveObjects($batch);
				}catch(AlgoliaSearch\AlgoliaException $e){
					$consoleOut[$key] = [
							"status" => "failed",
							"message" => $e->getMessage()
						];
				}
	    }
			$consoleOut[$key] = [
				"status" => "success",
				"message" => "Finshed Indexing"
				];
		}
		return $consoleOut;
	}
}
