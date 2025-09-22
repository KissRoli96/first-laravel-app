<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
 public function home()
 {
    $appName = config('app.name',"First Lavel App");
    return view("welcome", ["appName"=> $appName]);
 }
}
