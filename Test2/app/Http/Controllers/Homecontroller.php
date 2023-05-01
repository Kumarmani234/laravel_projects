<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Homecontroller extends Controller
{
   public function home() {
    return view('home.index');
   }
   public function cont() {
    return view('home.contacts');
   }
   
}
