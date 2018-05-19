<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use App\ListaNegra;
use Storage;
use DB;



use App\Ocupacion;
use App\Rubro;
use App\Natural;
use App\Juridico;


class PersonaController extends Controller
{
     public function index(Request $request)
    {
        $personas = Persona::orderBy('id','DESC')->get();
        $listas = ListaNegra::orderBy('id','DESC')->get();
        return view('personas.index', compact('personas','listas'));

    }

      public function create()
    {
        $ocupaciones=Ocupacion::all();
        $rubros=Rubro::all();
        return view('personas.create',compact('rubros'),compact('ocupaciones'));
    }
    public function store(Request $request)
    {
        $tipo='';
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required',
            'sexo' => 'required',
            'fecha_nac' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'email' => 'required',
            'firma' => 'mimes:jpeg,bmp,png,PNG|unique:persona,firma',
            'foto' => 'mimes:jpeg,bmp,png,PNG|unique:persona,foto',
        ]);
        if ($request->natural){
            $this->validate($request, [
                
                'nom_empleo' => 'required',
                'dir_empleo' => 'required',
                'ocupacion' => 'required',
               
            ]);
            $tipo= $request->natural;
        }else{
            if ($request->juridico){
            $this->validate($request, [
                'nit' => 'required|numeric',
                'nombre_comercial' => 'required',
                'tipo_empresa' => 'required',
                'fecha_constitucion' => 'required',
                'vencimiento_poder' => 'required',
                'rubro' => 'required',
            ]);
                $tipo= $request->juridico;
            }else{
                $this->validate($request, [
                    'tipo persona' => 'required',

                ]);
            }
        }


        $persona = new Persona();
        
        $persona ->nombre = $request->input('nombre');
        $persona ->apellido = $request->input('apellido');
        $persona->ci=$request->input('ci');
        $persona ->sexo = $request->input('sexo');
        $persona ->fecha_nac = $request->input('fecha_nac');
        $persona ->telefono = $request->input('telefono');
        $persona ->direccion = $request->input('direccion');
        $persona ->email = $request->input('email');

        if($request->hasFile('foto'))
          {

           $filename= time().'_'.$request->foto->getClientOriginalName(); 
           $request->foto->storeAs('public/upload',$filename);
           $persona->foto=$filename;
          }

        if($request->hasFile('firma'))
          {

           $filename= time().'_'.$request->firma->getClientOriginalName(); 
           $request->firma->storeAs('public/upload',$filename);
           $persona->firma=$filename;
          }
        
        $persona ->tipo = $tipo;
       // $persona ->estado ='habilitado';
        $persona ->save();


        if ($request->natural){

            $personaNatural=new Natural();
            $personaNatural->id=$persona ->id;
            $personaNatural->nom_empleo=$request->input('nom_empleo');
            $personaNatural->dir_empleo=$request->input('dir_empleo');
            $personaNatural->id_ocupacion=$request->input('ocupacion');
            $personaNatural->save();
        }

        if ($request->juridico){
            $personaJuridica=new Juridico();
            $personaJuridica->id=$persona ->id;
            $personaJuridica->nit=$request->input('nit');
            $personaJuridica->nombre_comercial=$request->input('nombre_comercial');
            $personaJuridica->tipo_empresa=$request->input('tipo_empresa');
            $personaJuridica->fecha_constitucion=$request->input('fecha_constitucion');
            $personaJuridica->vencimiento_poder=$request->input('vencimiento_poder');
            $personaJuridica->id_rubro=$request->input('rubro');
            $personaJuridica->save();
        }
		//dd($request);
        return redirect()->route('personas.index')
            ->with('success','Cliente registrado satisfactoriamente');
    }
     public function show($id)
    {
        $persona = Persona::find($id);
        
        $natural= Natural::join("persona","persona.id","=","cliente_natural.id")
         ->where("persona.id",$id)->get();
        $juridico= Juridico::join("persona","persona.id","=","cliente_juridico.id")
        ->where("persona.id",$id)->get();
        $ocupacion=Ocupacion::join("cliente_natural","cliente_natural.id_ocupacion","=","ocupacion.id")
        ->where("cliente_natural.id",$id)->get();
        $rubro=Rubro::join("cliente_juridico","cliente_juridico.id_rubro","=","rubro.id")
        ->where("cliente_juridico.id",$id)->get();
        $cuentas=DB::select("select cuenta.* from cuenta,detalle_cuenta where cuenta.nro_cuenta = detalle_cuenta.nro_cuenta
         and detalle_cuenta.id_persona = ".$id);

        
      // dd($cuentas);
        return view('personas.show',compact('persona','natural','juridico','ocupacion','rubro','cuentas'));

    }
     public function edit($id)
        {
            $persona = Persona::find($id);
            $natural = Natural::find($id);
            $juridico = Juridico::find($id);
            $ocupaciones=Ocupacion::all();
            $rubros=Rubro::all();
        return view('personas.edit',compact('persona','ocupaciones','rubros','natural','juridico'));

         }

    public function update(Request $request, $id)
    {
        $tipo='';
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required',
            'sexo' => 'required',
            'fecha_nac' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'email' => 'required',
            'firma' => 'mimes:jpeg,bmp,png,PNG|unique:persona,firma',
            'foto' => 'mimes:jpeg,bmp,png,PNG|unique:persona,foto',
        ]);
        if ($request->natural){
            $this->validate($request, [
                
                'nom_empleo' => 'required',
                'dir_empleo' => 'required',
                'ocupacion' => 'required',
               
            ]);
            $tipo= $request->natural;
        }else{
            if ($request->juridico){
            $this->validate($request, [
                'nit' => 'required|numeric',
                'nombre_comercial' => 'required',
                'tipo_empresa' => 'required',
                'fecha_constitucion' => 'required',
                'vencimiento_poder' => 'required',
                'rubro' => 'required',
            ]);
                $tipo= $request->juridico;
            }else{
                $this->validate($request, [
                    'tipo persona' => 'required',

                ]);
            }
        }

        $persona = Persona::find($id);
        $persona ->nombre = $request->input('nombre');
        $persona ->apellido = $request->input('apellido');
        $persona->ci=$request->input('ci');
        $persona ->sexo = $request->input('sexo');
        $persona ->fecha_nac = $request->input('fecha_nac');
        $persona ->telefono = $request->input('telefono');
        $persona ->direccion = $request->input('direccion');
        $persona ->email = $request->input('email');

        if($request->hasFile('foto'))
          {

           $filename= time().'_'.$request->foto->getClientOriginalName(); 
           $request->foto->storeAs('public/upload',$filename);
           $persona->foto=$filename;
          }

        if($request->hasFile('firma'))
          {

           $filename= time().'_'.$request->firma->getClientOriginalName(); 
           $request->firma->storeAs('public/upload',$filename);
           $persona->firma=$filename;
          }

        $persona ->tipo = $persona->tipo;
        $persona ->save();

        if ($request->natural){
            $personaNatural=Natural::find($id);
            $personaNatural->id=$persona ->id;
            $personaNatural->nom_empleo=$request->input('nom_empleo');
            $personaNatural->dir_empleo=$request->input('dir_empleo');
            $personaNatural->id_ocupacion=$request->input('ocupacion');
            $personaNatural->save();
        }
        if ($request->juridico){
            $personaJuridica=Juridico::find($id);
            $personaJuridica->id=$persona ->id;
            $personaJuridica->nit=$request->input('nit');
            $personaJuridica->nombre_comercial=$request->input('nombre_comercial');
            $personaJuridica->tipo_empresa=$request->input('tipo_empresa');
            $personaJuridica->fecha_constitucion=$request->input('fecha_constitucion');
            $personaJuridica->vencimiento_poder=$request->input('vencimiento_poder');
            $personaJuridica->id_rubro=$request->input('rubro');
            $personaJuridica->save();
        }


        return redirect()->route('personas.index')
            ->with('success','Cliente actualizado exitosamente');


    }
}
