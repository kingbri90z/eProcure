<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\symbolRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Symbol;
Use Illuminate\Http\Request;
use DB;


class symbolsController extends Controller
{
    public function index(){

        $symbols = Symbol::all();
        return response()->json($symbols);
    }
    public function autocomplete(Request $request){

        $term = $request->get('term');

        $results = array();

        $queries = DB::table('symbols')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query){
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return response()->json($results);
    }
}
