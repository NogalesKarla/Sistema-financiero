<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Chequera;
use DB;

class ChequeraController extends Controller
{
     public function index(Request $request)
    {
         $chequeras = DB::table('chequera as r')->join('cuenta as c','r.nro_cuenta','=','c.nro_cuenta')
        ->join('detalle_cuenta as dt','dt.nro_cuenta','=','c.nro_cuenta')
        ->join('persona as p','p.id','=','dt.id_persona')
        ->select('r.nro_chequera','r.fecha_expiracion','r.cantidad','r.precio_talonario','r.estado','p.ci as cliente','r.nro_cuenta')
        ->orderBy('r.nro_chequera','DESC')
        ->get();
		return view('chequeras.index',compact('chequeras'));
    }

    public function create()
    {
    	$cuentas=DB::select("select cuenta.nro_cuenta from cuenta where cuenta.tipo = 'Corriente'");
        return view('chequeras.create',compact('cuentas'));
    }
    public function store(Request $request)
    {
    	        $this->validate($request, [
            'fecha_expiracion' => 'required',
            'cantidad'=>'required',
            'precio_talonario'=>'required',
            
            'Ncuenta' => 'required',
        ]);

        $chequera = new Chequera();
        $chequera->fecha_expiracion= $request->input('fecha_expiracion');
        $chequera->cantidad = $request->input('cantidad');
        $chequera->precio_talonario = $request->input('precio_talonario');
        $chequera->estado ='Habilitado';
        $chequera->nro_cuenta = $request->input('Ncuenta');
        $chequera->save();

        BitacoraController::store ($request,"Asignar nueva chequera");
        return redirect()->route('chequeras.index')
            ->with('success','Chequera creada exitosamente');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chequera = Chequera::find($id);
        return view('chequeras.edit',compact('chequera'));
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

        $this->validate($request, [
            'estado' => 'required',
        ]);

        $chequera = Chequera::find($id);
        $chequeras = Chequera::find($id);
        $chequera->fecha_expiracion= $chequeras->fecha_expiracion;
        $chequera->cantidad = $chequeras->cantidad;
        $chequera->precio_talonario = $chequeras->precio_talonario;
        $chequera->nro_cuenta = $chequeras->nro_cuenta;
        $chequera->estado = $request->input('estado');
        $chequera->save();
		BitacoraController::store ($request,"Actualizar chequera");

        return redirect()->route('chequeras.index')
            ->with('success','Chequera Actualizada exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

}
