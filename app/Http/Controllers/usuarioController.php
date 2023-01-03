<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usuarioController extends Controller
{
    //Registrar
    public function registrar(Request $request)
    {

        try {

            // Validamos datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'password' => 'required|string|min:4',
            ]);

            // Crear un nuevo usuario con los datos del formulario
            $Usuario = new usuario();
            $Usuario->nombre = $request->nombre;
            $Usuario->password = Hash::make($request->password);
            $Usuario->conectado = false;

            // Guardamos
            $Usuario->save();
        } catch (\Exception $e) {
            // manejar el error aquí y enviar una respuesta de error a la aplicación de React
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

        // Respuesta de éxito
        return response()->json([
            'mensaje' => 'usuario creado exitosamente',
        ], 201);
    }

    //Buscar usuario
    public function buscarNombre($nombre)
    {
        //Buscamos
        $res = usuario::where('nombre', $nombre)->first();

        //Devolvemos
        if ($res) {
            //Se encontró
            return response()->json(['encontrado' => true]);
        } else {
            //No se encontró
            return response()->json(['encontrado' => false]);
        }
    }

    //Verificar usuario
    public function verificarDatos(Request $request)
    {
        try {

            //Datos
            $nombre = $request->nombre;
            $password = $request->password;

            // Verificar el nombre de usuario
            if ($user = usuario::where('nombre', $nombre)->first()) {
                //Verificamos contraseña
                if (Hash::check($password, $user->password)) {
                    //Devolvemos usuario
                    return response()->json($user->only('nombre', 'conectado'));
                } else {
                    return response()->json(['error' => 'Contraseña invalida'], 401);
                }
            } else {
                return response()->json(['error' => 'Usuario invalido'], 401);
            }
        } catch (\Exception $e) {
            // manejar el error aquí y enviar una respuesta de error a la aplicación de React
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Obtener usuario por nombre
    public function obtenerPorNombre($nombre)
    {
    }

    //Actualizar conexión
    public function actualizarConexionDeUsuario(Request $request, $nombre)
    {

        //Buscamos
        $user = usuario::where('nombre', $nombre)->first();

        //Verificamos
        if ($user) {

            //Actualizamos conexión
            $user->conectado = $request->conectado;
            $user->save();

            //Devolvemos
            return response()->json(['estado' => true]);
        }

        //No se encontró
        return response()->json(['encontrado' => false]);
    }
}
