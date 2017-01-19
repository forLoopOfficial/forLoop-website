<?php

namespace App\Http\Controllers;

class HomeController extends  Controller {

    public function index() {
      return view('index');
    }

    public function meetup() {
      return view('meetup');
    }

    public function members() {
      return view('members');
    }

    public function events() {
      return view('event');
    }

    public function team() {
      return view('team');
    }
}
