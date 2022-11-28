<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
App::setLocale('es');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");


Route::get('/home', [HomeController::class, 'index'])->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");

Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", ClientesController::class);
        Route::resource("usuarios", UserController::class)->parameters(["usuarios" => "user"]);
        Route::resource("productos", ProductosController::class);
        Route::get("/ventas/ticket", [VentasController::class, 'ticket'])->name("ventas.ticket");
        Route::resource("ventas", VentasController::class);
        Route::get("/vender", [VenderController::class, 'index'])->name("vender.index");
        Route::post("/productoDeVenta", [VenderController::class, 'agregarProductoVenta'])->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", [VenderController::class, 'quitarProductoDeVenta'])->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", [VenderController::class, 'terminarOCancelarVenta'])->name("terminarOCancelarVenta");
    });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
