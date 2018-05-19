@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Garante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('d_credito.index') }}"> Back</a>

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
    <form action="{{ route('garante.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}


        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>C.I.:</strong>
                {!! Form::text('ci', null, array('placeholder' => 'Carnet de Identidad','class' => 'form-control')) !!}
            </div>
        </div>

        <input type="hidden" name="idcredito" value="{{ $i }}">

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre Completo','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="fechaCreate">
             <strong>Fecha de Nacimiento:</strong>
          {!! Form::date('f_nacimiento', \Carbon\Carbon::now()) !!}
         </div>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Telefono:</strong>
                {!! Form::text('telefono', null, array('placeholder' => 'Telefono','class' => 'form-control')) !!}
            </div>
        </div>
        

        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Direccion:</strong>
                {!! Form::text('direccion', null, array('direccion' => 'Direccion','class' => 'form-control')) !!}
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          {{  csrf_field() }}

            <div class="form-group">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
  
</form>
   <!-- {!! Form::close() !!}-->

    
@endsection

