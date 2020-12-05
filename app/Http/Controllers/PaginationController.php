<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PaginationController extends Controller
{

    /**
     * FUNCIÓN QUE MUESTRA TODA LA CARTA DEL RESTAURANTE
     */
    public function index()
    {
        $data = DB::table('carta')->orderBy('id')->paginate(8);
        //dd($carta);
        return view('carta.carta', compact('data'));
    }


    function fetch_data(Request $request) {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('carta')
                ->where('nombre', 'like', '%' . $query . '%')
                ->paginate(8);
            return view('carta.pagination_data', compact('data'))->render();
        }
    }
}