<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BikesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccesoriiController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\TrotineteController;

Route::get('/', function () {
    return view("home");
})->name("principal");

Route::get("/locatie", function(){
return view("map");
})->name("location");

Route::prefix("user")->group(function(){
Route::get("/register", [UserController::class, "RegisterUser"])->name("register");
Route::post("/register", [UserController::class, "WorkRegisterUser"])->name("register-user");
Route::get("/login", [UserController::class,"LoginUser"])->name("Login");
Route::post("/login", [UserController::class, "WorkLoginUser"])->name("user-login");
Route::get("/dashboard", [UserController::class, "indexUser"])->name("user-dashboard");
Route::get("/logout", [UserController::class, "logoutUser"])->name("logout");
Route::put("/update", [UserController::class, "editUser"])->name("user-update");
Route::delete("/delete", [UserController::class, "deleteUser"])->name("user-delete");
Route::get("/activation/{code}", [UserController::class, "activateAccount"])->name("activate");
Route::get("/sendDate", [UserController::class, "sendLoadingPage"])->name("sendDate");
Route::get("/changePassword/view", [UserController::class, "changePassView"])->name("change-view");
Route::put("/change", [UserController::class, "changePassword"])->name("changePassword");
});
Route::prefix("admin")->group(function(){
Route::get("/register", [AdminController::class, "adminRegister"])->name("admin-register");
Route::post("/register", [AdminController::class, "WorkAdminRegister"])->name("admin-registerPost");
Route::get("/login", [AdminController::class, "LoginAdmin"])->name("admin-login");
Route::post("/login", [AdminController::class, "WorkLoginAdmin"])->name("admin-loginPost");
Route::get("/logout", [AdminController::class, "logoutAdmin" ])->name("logout-admin");
Route::put("/update", [AdminController::class, "EditAdmin"])->name("update-admin");
Route::delete("/delete", [AdminController::class, "deleteAdmin"])->name("delete-admin");
Route::get("/dashboard", [AdminController::class, "indexAdmin"])->name("admin-dashboard");

});

Route::prefix("/bikes")->group(function(){
    Route::get("/create",[BikesController::class, "createBike"])->name("create-bike");
Route::post("/create", [BikesController::class, "StoreBike"])->name("store-bike");
Route::get("/update", [BikesController::class, "updateViewBike"])->name("edit-bike");
Route::put("/update", [BikesController::class, "UpdateBike"])->name("update-bike");
Route::get("/", [BikesController::class, "indexBike"])->name("biciclete");
Route::get("/detalii/{bike}", [BikesController::class, "BikePage"])->name("bike-details");
});

Route::prefix("/trotinete")->group(function(){
Route::get("/create", [TrotineteController::class, "CreateTrotinete"])->name("create-trotinete");
Route::post("/create", [TrotineteController::class, "storeTrotinete"])->name("store-trotinete");
Route::get("/update", [TrotineteController::class, "UpdateViewTrotinete"])->name("edit-trotinete");
Route::put("/update", [TrotineteController::class, "UpdateTrotinete"])->name("update-trotinete");
Route::get("/micro-vehicule", [TrotineteController::class, "indexTrotinete"])->name("trotinete");
Route::get("/detalii/{trotinete}", [TrotineteController::class, "TrotinetePage"])->name("trotinete-details");

});

Route::prefix("/accesorii")->group(function(){
Route::get("/create", [AccesoriiController::class, "CreateAccesorii"])->name("create-accesorii");
Route::post("/create", [AccesoriiController::class, "StoreAccesorii"])->name("store-accesorii");
Route::get("/update", [AccesoriiController::class, "UpdateViewAccesorii"])->name("edit-accesorii");
Route::put("/update", [AccesoriiController::class, "UpdateAccesorii"])->name("update-accesorii");
Route::get("/pentru-tine", [AccesoriiController::class, "indexAccesorii"])->name("accesorii");
Route::get("/detalii/{accesorii}", [AccesoriiController::class, "AccesoriiPage"])->name("accesorii-details");

});

Route::prefix("/cart")->group(function(){
    Route::get('/home', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/increment/{cartItemId}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
    Route::post('/decrement/{cartItemId}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
    Route::delete('/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

});

Route::prefix("/favorites")->group(function(){
Route::get("/home", [FavoritesController::class, "viewFavorites"])->name("favorites.view");
Route::post("/add", [FavoritesController::class, "addToFavorites"])->name("favorites.add");
Route::delete("/remove{FavoritesItemId}", [FavoritesController::class, "removeFromFavorites"])->name("favorites-remove");


});
Route::prefix("/search")->group(function(){
Route::get('/rezult', [SearchController::class, 'search'])->name('search');
Route::get('/results-all', [SearchController::class, 'searchResults'])->name('search.results');
});
