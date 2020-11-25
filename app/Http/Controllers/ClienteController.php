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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

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
            //dd($validate);
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

        //subir la imagen
        $imagen_path = $request->file('avatar');
        if($imagen_path) {
            $imagen_path_name = time().$imagen_path->getClientOriginalName();
            Storage::disk('imagenes')->put($imagen_path_name , File::get($imagen_path));
            $user->avatar = $imagen_path_name;
        }

        //ejecutar consulta y guardar los cambios
        $user->update();

        return redirect()->route('profile' , ['id' => $id]);
    }


    public function delete() {
        $userDetails = Auth::user();
        $user = User::find($userDetails ->id);
        $id = $user->id;

        $user->delete();

        return redirect()->route('home');
    }

    
    public function contacto() {
        return view('users.nosotros');
    }

    public function getImagen($filename) {
        $file = Storage::disk('imagenes')->get($filename);
        return new Response($file , 200);
    }
    
}
