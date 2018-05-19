<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cuenta;
use App\Estado;
use App\Chequera;
use App\CuentaAhorro;
use App\CajaSeguridad;
use App\DepositoFijo;
use App\Detalle_Cuenta;
use DB;
class CuentaController extends Controller
{
    public function index(Request $request)
    {
        //$cuentas = Cuenta::orderBy('nro_cuenta','DESC')->get();
      /**  $cuentas=DB::select("select cuenta.* , estado.descripcion as estado from cuenta,detalle_cuenta ,estado where cuenta.nro_cuenta = detalle_cuenta.nro_cuenta
        and cuenta.id_estado=estado.id");

        $personas = Persona::orderBy('id','DESC')->get();**/
        $cuentas= Cuenta::orderBy('nro_cuenta','DESC')->get();
        
        return view('cuentas.index',compact('cuentas'));
    }

    public function create()
    {
        return view('cuentas.create');

    }
    public function createahorro($id)
    {
        $persona = Persona::find($id);
        return view('cuentas.createahorro',compact('id'),compact('persona'));

    }
    public function createcorriente($id)
    {
        $persona = Persona::find($id);
        return view('cuentas.createcorriente',compact('id'),compact('persona'));
    }
    public function createdepositofijo($id)
    {
        $persona = Persona::find($id);
        return view('cuentas.createdepositofijo',compact('id'),compact('persona'));
    }
    public function store(Request $request,$id)
    {

        $this->validate($request, [
            'monto' => 'required',
            'tipo' => 'required',
            'moneda' => 'required',
        ]);
        if ($request->tipo == "Corriente"){
            $this->validate($request, [
                'cantidadTalonario' => 'required',
                'precioTalonario' => 'required',
            ]);
        }
        if ($request->tipo == "DepositoFijo"){
            $this->validate($request, [
                'plazo' => 'required',
                'porcentaje' => 'required',
            ]);
        }
       // dd($request);
        $user=Auth::user();
        $cuenta = new Cuenta();
        $cuenta ->monto_apertura = $request->input('monto');
        $cuenta ->fecha_apertura = date('Y-m-d');
        $cuenta ->tipo = $request->input('tipo');
        $cuenta ->moneda = $request->input('moneda');
        $cuenta ->estado = 'Inhabilitado';
        $cuenta ->id_user=$user->id;
        $cuenta ->save();
        //dd($request);
        if ($request->tipo == "Global"){
            //dd($request);
            $cuentaahorro = new CuentaAhorro();
            $cuentaahorro ->nro_cuenta = $cuenta->nro_cuenta;
            $cuentaahorro ->tasa = $request->input('porcentaje');
            $cuentaahorro ->save();
        }
        if ($request->tipo == "Eficaz"){
            //dd($request);
            $cuentaahorro = new CuentaAhorro();
            $cuentaahorro ->nro_cuenta = $cuenta->nro_cuenta;
            $cuentaahorro ->tasa = $request->input('porcentaje');
            $cuentaahorro ->save();
        }
        if ($request->tipo == "Joven"){
            //dd($request);
            $cuentaahorro = new CuentaAhorro();
            $cuentaahorro ->nro_cuenta = $cuenta->nro_cuenta;
            $cuentaahorro ->tasa = $request->input('porcentaje');
            $cuentaahorro ->save();
        }
        if ($request->tipo == "Corriente"){
            //dd($request);
            $cuentacorriente = new Chequera();
            $cuentacorriente ->fecha_expiracion = $request->input('fecha_expiracion');
            $cuentacorriente ->cantidad = $request->input('cantidadTalonario');
            $cuentacorriente ->precio_talonario = $request->input('precioTalonario');
            $cuentacorriente ->estado = 'Habilitado';
            $cuentacorriente ->nro_cuenta = $cuenta->nro_cuenta;

            $cuentacorriente ->save();
        }
        if ($request->tipo == "DepositoFijo"){
            //dd($request);
            $cajaseguridad = new DepositoFijo();
            $cajaseguridad ->nro_cuenta = $cuenta->nro_cuenta;
            $cajaseguridad ->tasa = $request->input('porcentaje');
            $cajaseguridad ->plazo = $request->input('plazo');
            $cajaseguridad->save();
        }


        $detalle_cuenta = new Detalle_Cuenta();
        $detalle_cuenta ->nro_cuenta=$cuenta->nro_cuenta;
        $detalle_cuenta ->id_persona=$id;
        $detalle_cuenta -> save();

        return  redirect()->route('personas.show',['id'=>$id])
            ->with('success','Cuenta registrada satisfactoriamente');
    }

    public function show($nro_cuenta)
    {
        $cuenta = Cuenta::find($nro_cuenta);

        //$id = DB::select("select persona.id from cuenta,detalle_cuenta,persona where cuenta.nro_cuenta = detalle_cuenta.nro_cuenta
          //and detalle_cuenta.id_persona = persona.id and detalle_cuenta.id_persona = ".$nro_cuenta );
        //$persona = Persona::find($id);
        //$cuenta=DB::select("select cuenta.* , estado.descripcion as estado from cuenta,detalle_cuenta ,estado where cuenta.nro_cuenta = detalle_cuenta.nro_cuenta and cuenta.id_estado=estado.id and detalle_cuenta.id_persona = ".$id);

        return view('cuentas.show',compact('cuenta'),compact('id'),compact('persona'));


    }
//    public function show($id)
//    {
//        $persona = Persona::find($id);
//        $natural= Natural::join("persona","persona.id","=","cliente_natural.id")
//            ->where("persona.id",$id)->get();
//        $juridico= Juridico::join("persona","persona.id","=","cliente_juridico.id")
//            ->where("persona.id",$id)->get();
//        $ocupacion=Ocupacion::join("cliente_natural","cliente_natural.id_ocupacion","=","ocupacion.id")
//            ->where("cliente_natural.id",$id)->get();
//        $rubro=Rubro::join("cliente_juridico","cliente_juridico.id_rubro","=","rubro.id")
//            ->where("cliente_juridico.id",$id)->get();
//
//        $cuentas=DB::select("select cuenta.* , estado.descripcion as estado from cuenta,detalle_cuenta ,estado where cuenta.nro_cuenta = detalle_cuenta.nro_cuenta and cuenta.id_estado=estado.id and detalle_cuenta.id_persona = ".$id);
//        // dd($cuentas);
//        return view('personas.show',compact('persona','natural','juridico','ocupacion','rubro','cuentas'));
//
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nro_cuenta)
    {

        //$cuentas = Cuenta::find($nro_cuenta);

        $cuenta=Cuenta::find($nro_cuenta);
        $estado=Estado::all();
        

//dd($cuentas);
        return view('cuentas.edit',compact('cuenta','estado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nro_cuenta)
    {
        //$user=Auth::user();
        $this->validate($request, [
            'Nestado' => 'required',
        ]);
        $cuenta = Cuenta::find($nro_cuenta);
        $cuent = Cuenta::find($nro_cuenta);
        $cuenta ->monto_apertura = $cuent ->monto_apertura;
        $cuenta ->fecha_apertura = $cuent ->fecha_apertura;
        $cuenta ->tipo = $cuent->tipo ;
        $cuenta ->moneda = $cuent ->moneda;
        $cuenta ->id_estado = $request->input('Nestado');
        $cuenta ->id_user=$cuent ->id_user;
        $cuenta ->save();

        return redirect()->route('cuentas.index')
            ->with('success','Estado ASignado exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
