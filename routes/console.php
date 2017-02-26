<?php

use Illuminate\Foundation\Inspiring;
use App\Services\AlgoliaSyncService;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('reindex', function () {
    $output = AlgoliaSyncService::sync();
    foreach($output as $key => $data){
      if($data['status'] == "failed")
        $this->error($key . " => " .$data['message']);
      else {
        $this->info($key . " => " .$data['message']);
      }
    }
})->describe('Reindex algolia search with firebase data');
