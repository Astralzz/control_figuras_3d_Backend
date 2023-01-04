<?php

namespace App\Http\Controllers;

use App\Models\dona;
use App\Models\usuario;
use Illuminate\Http\Request;
use Exception;

class donaController extends Controller
{
    //Insertar valores por defecto
    public function insertarDatosPorDefecto(Request $request)
    {
        try {

            // Validamos nombre
            $request->validate([
                'usuario' => 'required|string|max:255',
            ]);

            //Si existe
            if (usuario::where('nombre', $request->usuario)->exists()) {

                // Crear un nuevo usuario con los datos del formulario
                $Dona = new dona();
                $Dona->usuario = $request->usuario;

                // Guardamos
                $Dona->save();
            } else {
                //Error
                throw new Exception('=( Usuario ->' . $request->usuario . '<- no encontrado para crear la dona');
            }
        } catch (\Exception $e) {
            // manejar el error aquí y enviar una respuesta de error a la aplicación de React
            return response()->json([
                'error' => $e->getMessage()
            ], 501);
        }
        // Respuesta de éxito
        return response()->json([
            'mensaje' => 'dona creada correctamente',
        ], 202);
    }

    public function obtenerPorNombre($usuario)
    {
        try {
            // Verificar que el usuario exista
            if ($dona = dona::where('usuario', $usuario)->first()) {
                //Devolvemos usuario
                return response()->json($dona->only('aleatorio', 'rotacion', 'movimiento', 'color_dona', 'color_fondo', 'opacidad'));
            } else {
                return response()->json(['error' => 'Usuario no encontrado'], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Devolver
    public function obtenerUsuariosComponentes()
    {

        $usuarioDona = usuario::join('donas', 'usuarios.nombre', '=', 'donas.usuario')
            ->select(
                'usuarios.conectado',
                'usuarios.nombre',
                'donas.aleatorio',
                'donas.rotacion',
                'donas.movimiento',
                'donas.color_dona',
                'donas.color_fondo',
                'donas.opacidad',
            )
            ->get();

        return view('index', compact('usuarioDona'));
    }

    //Actualizar
    public function actualizarDonas(Request $request)
    {
        //Buscamos
        $dona = dona::where('usuario', $request->usuario)->first();

        //Verificamos
        if ($dona) {

            //Actualizamos conexión
            $dona->aleatorio = $request->aleatorio;
            $dona->rotacion = $request->rotacion;
            $dona->movimiento = $request->movimiento;
            $dona->color_dona = $request->color_dona;
            $dona->color_fondo = $request->color_fondo;
            $dona->opacidad = $request->opacidad;
            $dona->save();

            //Devolvemos
            return response()->json(['encontrado' => true]);
        }

        //No se encontró
        return response()->json(['encontrado' => false]);
    }

    //Eliminar por nombre
    public function destroyPorTabla($nombre)
    {
        //Buscamos dona
        $dona = dona::where('usuario', $nombre)->first();

        //Verificamos
        if ($dona) {

            //Eliminamos
            $dona->delete();

            //Buscamos usuario
            $usuario = usuario::where('nombre', $nombre)->first();
            //Eliminamos
            $usuario->delete();

            //Devolvemos
            return redirect("/");
        }
    }
}


//    // Verificar el nombre de usuario y obtener el campo resultado
//    if ($user = usuario::where('nombre', $nombre)->first()->only('conectado')) {

//     $posts = DB::table('donas')
//         ->join('usuarios', 'nombre', '=', 'donas.usuario')
//         ->select('usuarios.conectado', 'donas.title')
//         ->get();
// }
