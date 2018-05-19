<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class d_creditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $creditos = DB::table('credito')->get();
        $clientes = DB::table('persona')->get();
        $creditos2= DB::table('t_credito')->get();
        return view('creditos.index',compact('creditos'),compact('clientes'),compact('creditos2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = DB::table('persona')->get();
        $t_creditos= DB::table('t_credito')->get();
        return view('creditos.create',compact('clientes'),compact('t_creditos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        DB::table('credito')->insert([
            "id_t_cre"=>$request->input('id_t_cre'),
            "moneda"=>$request->input('moneda'),
            "fecha"=>$request->input('fecha'),
            "plazo"=>$request->input('plazo'),
            "id_cliente"=>$request->input('id_cliente'),
            "monto"=>$request->input('monto')
            ]);
        return redirect()->route('d_credito.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $credito = DB::table('d_credito')->where('id',$id)->first();
        $clientes = DB::table('persona')->get();
        $tipocreditos = DB::table('t_credito')->get();
        $ids = DB::table('cre_garante')->where('id_credito',$id)->get();
        $garantes = DB::table('garante')->get();
        return view('creditos.show',compact('credito','ids','garantes'),compact('clientes','tipocreditos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
