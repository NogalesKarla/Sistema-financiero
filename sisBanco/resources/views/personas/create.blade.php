@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nueva Persona</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>

            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <!--  {!! Form::open(array('route' => 'personas.store','method'=>'POST','files'=>'true')) !!}-->
    <form action="{{ route('personas.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
         <div class="form-group">
                <strong>Sexo:</strong>
                <select name="sexo" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">

                    <div class="form-group">
                    <strong>Carnet de Identidad:</strong>
                    {!! Form::text('ci', null, array('placeholder' => 'Ci','class' => 'form-control')) !!}
                    </div>
       </div>
        <div class="col-lg-10 col-xs-12 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Direccion:</strong>
        {!! Form::text('direccion', null, array('placeholder' => 'Direccion','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="fechaCreate">
             <strong>Fecha de Nacimiento:</strong>
          {!! Form::date('fecha_nac', \Carbon\Carbon::now()) !!}
         </div>
        </div>

        
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Telefono:</strong>
                {!! Form::text('telefono', null, array('placeholder' => 'Telefono','class' => 'form-control')) !!}
            </div>
        </div> 

       <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
                  {{  csrf_field() }}
                   <strong>Foto:</strong>
                  <label for="foto"></label>
                  <input type="file" name="foto">

        </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
                  {{  csrf_field() }}
                   <strong>Firma:</strong>
                  <label for="firma"></label>
                  <input type="file" name="firma">

        </div>
        </div>          


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div id="mainForm"  name="mainForm" class="form-group">
            <label>
                natural
                <input type="radio" onclick="clickNatural()" name="natural" id="natural" value="natural"  class="flat-red" >
            </label>
            <label>
                juridico
                <input type="radio" id="juridico" name="juridico"   onclick="clickJuridico()"   value="juridico"   class="flat-red">
            </label>
        </div>

</div>
        <div id="formularioNatural">
            
            
            <div class="col-xs-12 col-sm-10 col-md-10">
                 <strong>Ocupacion :</strong>
                <select name="ocupacion" id="" class="form-control selectpicker" data-live-search="true">
                    @foreach($ocupaciones as $key => $ocupacion)
                        <option value="{{$ocupacion->id}}"> {{$ocupacion->nombre}} </option>
                    @endforeach
                </select>

            </div>
            <div class="col-xs-12 col-sm-10 col-md-10">
                
                <div class="form-group">
                    <strong>Nombre de la institucion de trabajo:</strong>
                    {!! Form::text('nom_empleo', null, array('placeholder' => '.....','class' => 'form-control')) !!}
                </div>
               
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10">
              
                <div class="form-group">
                    <strong>Direccion de la institucion de trabajo:</strong>
                    {!! Form::text('dir_empleo', null, array('placeholder' => '.....','class' => 'form-control')) !!}
                </div>
                
            </div>
        </div>


<div id="formularioJuridico">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <strong>NIT:</strong>
                    {!! Form::text('nit', null, array('placeholder' => 'nit','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Nombre comercial:</strong>
                    {!! Form::text('nombre_comercial', null, array('placeholder' => 'nombre comercial','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('Tipo Empresa: ') !!}
                    <select name="tipo_empresa" id="" class="form-control selectpicker" data-live-search="true">
                        <option value="S.A"> S.A </option>
                        <option value="S.R.L"> S.R.L </option>

                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <strong>Rubro:</strong>
                <select name="rubro" id="" class="form-control selectpicker" data-live-search="true">
                    @foreach($rubros as $key => $rubro)
                        <option value="{{$rubro->id}}"> {{$rubro->nombre}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de constitucion:</strong>
                        {!! Form::date('fecha_constitucion', \Carbon\Carbon::now()) !!}
                    </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de Vencimiento Poder:</strong>
                    {!! Form::date('vencimiento_poder', \Carbon\Carbon::now()) !!}
                </div>
            </div>
            
        </div>
       
          

        


          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
            <button onclick="myFunction()" type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    
    </div>
</form>
   <!-- {!! Form::close() !!}-->

    
@endsection

@section('script')
    <script>

        $(document).ready(function(){
            formularioNatural.style.display = 'none';
            formularioJuridico.style.display = 'none';

        });
        function  clickNatural(){
            document.getElementById("juridico").checked = false;

            divNatural = document.getElementById('natural');
            if(divNatural.checked){

                formularioNatural.style.display = '';
                formularioJuridico.style.display = 'none';
            }
        }
        function  clickJuridico(){
            document.getElementById("natural").checked = false;

            divNatural = document.getElementById('juridico');
            if(divNatural.checked){

                formularioNatural.style.display = 'none';
                formularioJuridico.style.display = '';
            }
        }
    </script>
@endsection