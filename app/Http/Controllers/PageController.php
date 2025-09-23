<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
 public function home(): View
 {
    $appName = config('app.name',"First Lavel App");

    return view("welcome", ["appName" => $appName]);
 }
}
