<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'Welcome', ['name' => 'Luisito']);

Route::get('/hola', function () {
    return route('saludo');
})->name('saludo');

Route::get('suma', function () {
    $a = 7;
    $b = 3;
    return $a + $b;
})->name('plus');

Route::get('redireccion', function() {
    return redirect()->route('plus');
});

Route::get('nombre/{name}', function ($name) {
    return 'El nombre es '.$name;
})->name('tu.nombre');

Route::get('operacion/{a?}', function ($a = 4) {
    $b = 3;
    return $a + $b;
});

Route::get('user/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' Name: '.$name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

Route::redirect('publicaciones', 'articulos');

Route::get('articulos', function () {
    return 'Estoy en Articulos';
});

Route::get('verificar', function() {
    if (Request::route()->named('verify')) {
        return 'OK';
    } else {
        return 'No es la ruta';
    }
})->name('verify');