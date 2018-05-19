@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Datos del Cliente</h2>
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

    {!! Form::model($persona, ['method' => 'PATCH','route' => ['personas.update', $persona->id],'files'=>'true']) !!}
    <div class="row">
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Apellido:</strong>
                {!! Form::text('apellido', null, array('placeholder' => 'apellido','class' => 'form-control')) !!}
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
                    {!! Form::text('ci', null, array('placeholder' => 'ci','class' => 'form-control')) !!}
                    </div>
       </div>
        <div class="col-lg-10 col-xs-12 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Direccion:</strong>
        {!! Form::text('direccion', null, array('placeholder' => 'direccion','class' => 'form-control')) !!}
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
                {!! Form::text('telefono', null, array('placeholder' => 'telefono','class' => 'form-control')) !!}
            </div>
        </div> 

       <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
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

        <div id="mainForm"  name="mainForm" class="col-xs-12 col-sm-12 col-md-12" type="hidden">

            @if($persona->tipo=='natural')
                <label>
                    natural
                    <input type="radio" name="natural" id="natural" checked="checked" value="natural"  class="flat-red" >
                </label>
                <label>
                    juridico
                    <input type="radio" id="juridico" name="juridico"   disabled="disabled"  value="juridico"   class="flat-red"  >

                </label>
                
            @endif
            @if($persona->tipo=='juridico')
                <label>
                    natural
                    <input type="radio" name="natural" id="natural" disabled="disabled" value="natural"  class="flat-red" >
                </label>
                <label>
                    juridico
                    <input type="radio" id="juridico" name="juridico"   checked="checked"  value="juridico"   class="flat-red"  >

                </label>
                
            @endif

           

        </div>



        @if($persona->tipo=='natural')
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
                    {!! Form::text('nom_empleo', null, array('placeholder' => $natural->nom_empleo,'class' => 'form-control')) !!}
                </div>
               
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10">
              
                <div class="form-group">
                    <strong>Direccion de la institucion de trabajo:</strong>
                    {!! Form::text('dir_empleo', null, array('placeholder' => $natural->dir_empleo,'class' => 'form-control')) !!}
                </div>
                
            </div>
        @endif

       @if($persona->tipo=='juridico')
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <strong>NIT:</strong>
                    {!! Form::text('nit', null, array('placeholder' => $juridico->nit,'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Nombre comercial:</strong>
                    {!! Form::text('nombre_comercial', null, array('placeholder' => $juridico->nombre_comercial,'class' => 'form-control')) !!}
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
        
         @endif
        
        
      
      



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </div>


    {!! Form::close() !!}


@endsection

