<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{

    /**
     * View all products
     * 
     * @param 
     * @return view carta
     */
    public function index()
    {
        $data = DB::table('carta')->orderBy('id')->paginate(8);
        //dd($carta);
        return view('carta.carta', compact('data'));
    }


    /**
     * Search product's by name
     * 
     * @param req product's name
     * @return view product
     */
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