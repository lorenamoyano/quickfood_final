<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User ;
use App\Models\Carta ;

class AdminController extends Controller
{
    public function admin_panel() {
        $user = DB::table('cliente')->get();
        return view('users.admin_panel', ['user' => $user]);
    }

    
    public function perfil(Request $id){
        DB::table('cliente')->where('id', $id->input('id'))->update(['perfil' => $id->input('perfil')]);
        $user = DB::table('cliente')->get();
        return view('users.admin_panel', ['user' => $user]);
    }

    
    public function delete_user(Request $id){
        DB::table('cliente')->where('id',$id->input('id'))->delete();
        $user = DB::table('cliente')->get();
        return view('users.admin_panel', ['user' => $user]);
    }

    public function anadir() {
        return view('carta.add_producto');
    }

    public function add_carta(Request $data) {
        $data->validate([
            'nombre' => ['required', 'string'],
            'precio' => ['required', 'numeric'],
            'descripcion' => ['required', 'string'],
        ]) ;

        $nombre = $data->input('nombre');
        $precio = $data->input('precio');
        $descripcion = $data->input('descripcion');
        
        Carta::create([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion
        ]);
        return redirect()->route('ver');
        
    }
}