<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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

Route::get('/products', function (Request $request):JsonResponse {
    return response()->json([
        'request' => $request,
        'operation' => 'list',
        'message'   => 'Listed products',
    ]);
})->name('guest.products.list');

Route::post('/products/create', function (Request $request):JsonResponse{
    // $request->all() would have the incoming JSON body
    return response()->json([
        'operation' => 'create',
        'message'   => 'Product created',
    ], 201);
})->name('guest.products.create');

Route::put('/products/{id}/edit', function (Request $request, int $id):JsonResponse {
    return response()->json([
        'operation'  => 'update',
        'product_id' => $id,
        'message'    => 'Product updated',
    ]);
})->name('guest.products.edit');

Route::delete('/products/{id}/delete', function (int $id):JsonResponse {
    return response()->json([
        'operation'  => 'delete',
        'product_id' => $id,
        'message'    => 'Product deleted',
    ]);
})->name('guest.prodcuts.delete');

/*2. Hozz létre egy /user/{id}/post/{postid} route-ot, amely két paramétert fogad.
 Jelenítse meg: "Felhasználó: {id}, Bejegyzés: {postid}".
  Például /user/5/post/10 esetén: "Felhasználó: 5, Bejegyzés: 10"
*/
 Route::get('/user/{id}/post/{postId}', function (int $id, int $postId):JsonResponse {
    return response()->json([
        'operation' => 'list a post',
        'post_id' => $postId,
        'user_id' => $id,
        'message' => "Felhasználó: {id}, Bejegyzés: {postid}"
    ]);
});

/*
3. Készíts egy /welcome/{name?} route-ot opcionális paraméterrel.
Ha megadják a nevet, köszöntsön név szerint ("Üdv {név}!"), ha nem adnak meg nevet,
 akkor általános üdvözlés legyen ("Üdv Vendég!").
*/
Route::get('/welcome/{name?}', function ($name = null):JsonResponse{
    $message = '';
    if (is_null($name)) {
        $message = "Üdv Vendég!";
    } else {
        $message = "Üdv {$name}";
    }

    return response()->json([
        'name'=> $name,
        'message' =>  $message
    ]);
});

/*
4. Hozz létre egy /profile route-ot és adj neki "profile.show" nevet a ->name() metódussal.
Készíts egy másik route-ot /test,
amely a route('profile.show') helper függvénnyel generálja és jelenítse meg a profile route URL-jét.
*/
Route::get('/profile', function ():JsonResponse  {
    return response()->json([
        'operation' => 'Profile',
        'message' => 'Profie test page'
    ]);
})->name('profile.show');

Route::get('/test', function ():JsonResponse {
    $url = route('profile.show');
    return response()->json([
        'profile_url' => $url
    ]);
});

/*
5. Hozz létre egy PageController-t a make:controller paranccsal.
Készíts benne egy home() metódust,
amely a view() helper-rel visszaad egy 'welcome' nézetet. Kösd össze a / route-ot ezzel a controller metódussal.
A controller-ben használd a config() helper-t az alkalmazás nevének megjelenítéséhez.
*/

Route::get('/', [PageController::class,'home']);
