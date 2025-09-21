<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

Route::get('/', function (): View {
    return view('welcome');
})->name('guest.home');

Route::get('/home2', function (): View {
    return view('home2');
})->name('guest.home');
