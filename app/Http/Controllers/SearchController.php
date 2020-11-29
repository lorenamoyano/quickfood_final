<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {
        
        $carta = DB::table('carta')->get();
        if($request->has('q')){
            $q=$request->q;
            $result = Carta::where('nombre' , 'like' , '%'.$q.'%')->get();
            return response()->json(['data'=>$result]);
        } else {
            return view('carta.carta' , ['carta' => $carta]);
        }
        
    }
}
