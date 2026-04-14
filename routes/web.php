<?php

use App\Models\Destinations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;

Route::get('/home', function (){
    return ('welcome');
});

Route::get('/halo', function (){
    $name = "Raihan";
    $hobi = ["membaca", "menulis", "bermain game"];
    return view('halo', compact('name', 'hobi'));
});
route::get( '/',  function (){
    return view('welcome');
});
route::get("/halo", action: function (){
    $name = "Raihan";
    $hobis = ["membaca", "menulis", "bermain game"];
    return view('halo', compact('name', 'hobis'));
});
route::get( "/switch",  function (){
    $role = "admin";
    return view('switch', compact('role'));
});
route::get("master", function (){
    return view('pages.home');
});
route::get("about", function (){
    return view('pages.about');
});
route::get("/destinasi", function (){
    $destinasi = [
    "nama" => "bali",
    "harga" => 5000000,
    "durasi" => "5 hari 4 malam",
    "transportasi" => "pesawat",
    "hotel" => "bintang 5",
    "rating" => 4.8,
    "fasilitas" => ["Hotel", "Sarapan", "Tour Guide", "Transportasi lokal"],
    ];

    return view('pages.destinasi', compact('destinasi'));
}); 

// Route::get("/destinations", function () {
//     $destinations= Destinations::all();
//     return view('pages.indexDestinasi', compact('destinations'));
// });

// Route::get("/destinations/{id}", function ($id) {
//     $destinations = Destinations::find($id);
//     return view('pages.detaildestinasi', compact('destinations'));
//     });

    Route::get(
        "/destinations",
       [DestinationController::class, 'index']
    );
Route::get("/destinations/{id}", [DestinationController::class, 'show']);

Route::get("/destination/create", [DestinationController::class, 'create']);
Route::post('/destination', [DestinationController::class, 'store']);

Route::delete('/destination/{id}', [DestinationController::class, 'delete']);

Route::get("/destinations/{id}/edit", [DestinationController::class,'edit']);
Route::put("/destinations/{id}/update", [DestinationController::class,'update']);

Route::get("/user", [UserController::class,"index"]);
route::get("/user/create", [UserController::class,"create"]);
Route::post('/user/store', [UserController::class, 'store']);
Route::get("/users/{id}/edit",[UserController::class, 'edit']);
Route::put("/users/{id}/update",[UserController::class,"update"]);