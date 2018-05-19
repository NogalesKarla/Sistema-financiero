<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class garanteController extends Controller
{
    //


	 public function create($id){

	 	$i = $id;
    	return view('creditos.garante',compact('i'));
    }

       public function store(Request $request)
    {
        //
        DB::table('garante')->insert([
            "f_nacimiento"=>$request->input('f_nacimiento'),
            "ci"=>$request->input('ci'),
            "nombre"=>$request->input('nombre'),
            "telefono"=>$request->input('telefono'),
            "direccion"=>$request->input('direccion')
            ]);
        $ci = $request->input('ci');
        $garante = DB::table('garante')->where('ci',$ci)->first();
        DB::table('cre_garante')->insert([
        	"id_garante"=>$garante->id,
        	"id_credito"=>$request->input('idcredito')
        	]);
        return redirect()->route('d_credito.index');
    }

}
