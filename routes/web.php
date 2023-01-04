<?php

use App\Http\Controllers\donaController;
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

//Index
Route::get('/', [donaController::class, 'obtenerUsuariosComponentes']);
Route::get('/administrador', [donaController::class, 'obtenerUsuariosComponentes']);

//Donas
Route::controller(donaController::class)->group(function () {
    //Obtener donas
    Route::get('/figuras/donas/obtener/lista', 'obtenerUsuariosComponentes')->name("obtenerListaDonas");
    //Actualizar
    Route::put('/figuras/donas/actualizar', 'actualizarDonas')->name("actualizarLasDonas");
    //Actualizar
    Route::delete('/figuras/donas/eliminar/tabla/{nombre}', 'destroyPorTabla')->name("eliminarDonaPorTabla");
});
