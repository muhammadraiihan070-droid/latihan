<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function (){
    $name = "Raihan";
    $hobi = ["membaca", "menulis", "bermain game"];
    return view('halo', compact('name', 'hobi'));
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

    

Route::get("/user", [UserController::class,"index"]);
route::get("/user/create", [UserController::class,"create"]);
Route::post('/user/store', [UserController::class, 'store']);
Route::get("/users/{id}/edit",[UserController::class, 'edit']);
Route::put("/users/{id}/update",[UserController::class,"update"]);

Route::prefix('destinations')->name('destinations.')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('index');
    Route::get('/create', [DestinationController::class, 'create'])->name('create');
    Route::post('/', [DestinationController::class, 'store'])->name('store');
    Route::get('/{id}/show', [DestinationController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [DestinationController::class, 'edit'])->name('edit');
    Route::put('/{id}', [DestinationController::class, 'update'])->name('update');
    Route::delete('/{id}', [DestinationController::class, 'delete'])->name('delete');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get("{id}/show", [UserController::class, 'show'])->name('show');

});
Route::prefix('attractions')->name('attractions.')->group(function () {
     Route::get('/', [AttractionController::class, 'index'])->name('index');
    Route::get('/create', [AttractionController::class, 'create'])->name('create');
    Route::post('/', [AttractionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AttractionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AttractionController::class, 'update'])->name('update');
    Route::delete('/{id}', [AttractionController::class, 'destroy'])->name('destroy');
    Route::get("{id}/show", [AttractionController::class, 'show'])->name('show');

});
    


Route::resource('reviews',ReviewController::class);