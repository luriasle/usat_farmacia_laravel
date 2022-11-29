<?php

use App\Models\Cliente;
use App\Models\Product;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/status", function () {
    return Auth::guard('api')->check();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::get("productos", function () {
            return response()->json(Product::all());
        });

        Route::post("/producto", function(Request $request){
            $producto = new Product($request->input());
            $producto->saveOrFail();
            return response()->json(["data" => "true"]);
        });
        Route::get("/producto/{id}", function($id){
            $producto = Product::findOrFail($id);
            return response()->json($producto);
        });
        Route::put("/producto", function(Request $request){
            $producto = Product::findOrFail($request->input("id"));
            $producto->fill($request->input());
            $producto->saveOrFail();
            return response()->json(true);
        });
        Route::delete("/producto/{id}", function($id){
            $producto = Product::findOrFail($id);
            $producto->delete();
            return response()->json(true);
        });

        // Clientes

        Route::get("clientes", function () {
            return response()->json(Cliente::all());
        });
        Route::post("/cliente", function(Request $request){
            $cliente = new Cliente($request->input());
            $cliente->saveOrFail();
            return response()->json(["data" => "true"]);
        });
        Route::get("/cliente/{id}", function($id){
            $cliente = Cliente::findOrFail($id);
            return response()->json($cliente);
        });
        Route::put("/cliente", function(Request $request){
            $cliente = Cliente::findOrFail($request->input("id"));
            $cliente->fill($request->input());
            $cliente->saveOrFail();
            return response()->json(true);
        });
        Route::delete("/cliente/{id}", function($id){
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return response()->json(true);
        });

        // Ventas
        Route::get("ventas", function () {
            return response()->json(Venta::with(["productos", "cliente"])->get());
        });
        Route::post("/venta", function(Request $request){
            $venta = new Venta($request->input());
            $venta->saveOrFail();
            return response()->json(["data" => "true"]);
        });
        Route::get("/venta/{id}", function($id){
            $venta = Venta::with(["productos", "cliente"])->findOrFail($id);
            return response()->json($venta);
        });
        Route::delete("/venta/{id}", function($id){
            $venta = Venta::findOrFail($id);
            $venta->delete();
            return response()->json(true);
        });

    });
});

// Route::post("/usuarios/register", function(Request $request){

//     $validator = Validator::make($request->all(), [
//         'name' => ['required', 'string', 'max:255'],
//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//         'password' => ['required', 'string', new Password, 'confirmed'],
//     ]);

//     if ($validator->fails()) {
//         return response()->json(['estado' => false, 'errors' => $validator->errors()]);
//     } else {
//         $usuario = new User($request->input());
//         $usuario->password = Hash::make($usuario->password);

//         if($usuario->save()){
//             return response()->json(['estado' => true, 'data' => 'fd']);
//         } else {
//             return response()->json(
//                 [
//                     'estado' => false,
//                     'errors' => [
//                         'registro' => [
//                             'Error al registrar usuario, vuelva a intentarlo por favor.'
//                         ]
//                     ]
//                 ]
//             );
//         }

//     }

// })->name("usuarios.register");
