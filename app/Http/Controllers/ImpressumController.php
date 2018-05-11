<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Impressum;

class ImpressumController extends Controller
{
    public function index(){
        return view('front.impressum');
    }
}
