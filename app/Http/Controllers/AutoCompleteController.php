<?php

namespace App\Http\Controllers;


use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use App\Models\Carta;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function index()
    {   
        return view('carta.search');
    }
    public function search(Request $request)
    {
        $posts=Carta::where('nombre',$request->keywords)->get();
        return response()->json($posts);
         
    }
}
