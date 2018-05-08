<?php

namespace App\Http\Controllers;

use App\PublicHome;

class PublicController extends Controller
{
    public function index(){
        return view('front.public');
    }
}
