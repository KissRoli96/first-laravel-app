<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

Route::get('/', function (): View {
    return view('welcome');
})->name('guest.home');

Route::get('/home2', function (): View {
    return view('home2');
})->name('guest.home');

Route::get('/greeting', function () {
    return 'Hello World';
});
/*
Route::get('/products', function (): Response{
    return response('All Products delivered', 200)
        ->header('Content-Type', 'application/json');
});
*/
Route::post('products/create', function (): Response {
    return response('created', 201)
        ->header('Content-Type', 'application/json');
});

Route::put('products/{id}/edit', function () : Response {
    return response('Updated', 201)
    ->header('Content-Type', 'application/json');
});

/*
Route::delete('/products/{id}/delete', function ($id): Response{
    return response
});
*/

Route::get('/products', function () {
    return response()->json([
        'operation' => 'list',
        'message'   => 'Listed products',
    ]);
});

Route::post('/products/create', function (Request $request) {
    // $request->all() would have the incoming JSON body
    return response()->json([
        'operation' => 'create',
        'message'   => 'Product created',
    ], 201);
});

Route::put('/products/{id}/edit', function (Request $request, $id) {
    return response()->json([
        'operation'  => 'update',
        'product_id' => (int) $id,
        'message'    => 'Product updated',
    ]);
});

Route::delete('/products/{id}/delete', function ($id) {
    return response()->json([
        'operation'  => 'delete',
        'product_id' => (int) $id,
        'message'    => 'Product deleted',
    ]);
});