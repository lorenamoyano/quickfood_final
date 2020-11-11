<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{


    /**
     * NO PODER ACCEDER AL USUARIO SIN
     * ESTAR LOGUEADO
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile ($id) {
        $user = User::find($id);

        return view('users.profile' , [
            'user' => $user
        ]);
        //return redirect()->with('error', '¡No tienes permisos para acceder a este usuario!');
    }

    public function config() {
        return view ('users.config');
    }

    public function update(Request $request) {
        //conseguir el usuario que esta identificado
        
        $userDetails = Auth::user();
        $user = User::find($userDetails ->id);
        $id = $user->id;

        
        //validación de los datos del formulario
        $validate = $this->validate($request , [
            'nombre' => ['required', 'string', 'max:250'],
            'apellido1' => ['required' , 'string' , 'max:100'],
            'apellido2' => ['required' , 'string' , 'max:100'],
            'telefono' => ['required' , 'string' , 'max:9' , 'unique:cliente,telefono,'.$id],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:cliente,email,'.$id],
            'ciudad' => ['required' , 'string' , 'max:50'],
        ]);

        //recogida de los datos del formulario
        $nombre = $request->input('nombre');
        $apellido1 = $request->input('apellido1');
        $apellido2 = $request->input('apellido2');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $ciudad = $request->input('ciudad');

        //asignar nuevos valores al usuario
        $user->nombre = $nombre;
        $user->apellido1 = $apellido1;
        $user->apellido2 = $apellido2;
        $user->telefono = $telefono;
        $user->email = $email;
        $user->ciudad = $ciudad;

        //ejecutar consulta y guardar los cambios
        $user->update();

        return redirect()->route('config')->with(['message'=>'Usuario actualizado correctamente']);
    }


    public function delete() {
        $userDetails = Auth::user();
        $user = User::find($userDetails ->id);
        $id = $user->id;

        $user->delete();

        return view ('home');
    }


    
    
}
