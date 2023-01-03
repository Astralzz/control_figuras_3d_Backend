<?php

use App\Http\Controllers\donaController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;


//Usuarios
Route::controller(usuarioController::class)->group(function () {
    //Guardar usuarios
    Route::post('/figuras/usuarios/guardar', 'registrar')->name("registrarUsuarios");
    //Buscar usuario por nombre
    Route::get('/figuras/usuarios/buscar/nombre/{nombre}', 'buscarNombre')->name("buscarUsuarioPorNombre");
    //Versificar usuario y credenciales
    Route::post('/figuras/usuarios/verificar', 'verificarDatos')->name("verificarUsuario");
    //Obtener usuario por nombre
    Route::get('/figuras/usuarios/obtener/{nombre}', 'obtenerPorNombre')->name("obtenerUsuarioPorNombre");
    //Cambiar conexión
    Route::put('/figuras/usuarios/actualizar/conexion/{nombre}', 'actualizarConexionDeUsuario')->name("obtenerUsuarioPorNombre");
});

//Donas
Route::controller(donaController::class)->group(function () {
    //Guardar donas
    Route::post('/figuras/donas/guardar', 'insertarDatosPorDefecto')->name("registrarDonas");
    //Obtener dona por nombre
    Route::get('/figuras/donas/obtener/{nombre}', 'obtenerPorNombre')->name("obtenerDonaPorNombre");
});

