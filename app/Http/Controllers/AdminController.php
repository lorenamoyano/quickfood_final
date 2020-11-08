<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User ;

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
}