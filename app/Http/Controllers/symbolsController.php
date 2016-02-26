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
    /**
     * Used right now in the ajax call when adding in or editing a block
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){

        $symbols = Symbol::all();
        return response()->json($symbols);
    }

    public function adminIndex(){

        $symbols = Symbol::orderBy('name', 'asc')->get();

        return view('symbols.admin.main')->with('symbols', $symbols);
    }

    public function edit($id){

        $symbol = Symbol::findOrFail($id);

        return view('symbols.edit')->with('symbol', $symbol);
    }

    public function update($id, Request $request){

        $symbol = Symbol::findOrFail($id);

        $symbol->update($request->all());

        return redirect('admin/symbols');

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
