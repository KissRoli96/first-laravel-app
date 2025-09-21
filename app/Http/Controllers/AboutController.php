<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view("about");
    }
}