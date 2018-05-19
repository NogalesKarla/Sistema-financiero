@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo Credito</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('t_credito.index') }}"> Back</a>

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
    <form action="{{ route('t_credito.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tasa de Interes:</strong>
                {!! Form::text('tasa_interes', null, array('placeholder' => 'Tasa de Interes','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    {!! Form::textarea('descripcion', null, array('placeholder' => 'Descripcion','class' => 'form-control','rows'=>3)) !!}
                </div>
       </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          {{  csrf_field() }}

            <div class="form-group">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    
    </div>
</form>
   <!-- {!! Form::close() !!}-->

    
@endsection

