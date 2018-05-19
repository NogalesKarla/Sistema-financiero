@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo Credito</h2>
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
    <form action="{{ route('d_credito.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Cliente:</strong>
               <select name="id_cliente" id="" class="form-control selectpicker" data-live-search="true">
                  <?php foreach ($clientes as $key => $row): ?>
                      <option value="{{ $row->id }}" >{{ $row->nombre }}</option>
                  <?php endforeach ?>
               </select>
            </div>
        </div>


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Tipo de Credito:</strong>
               <select name="id_t_cre" id="" class="form-control selectpicker" data-live-search="true">
                  <?php foreach ($t_creditos as $key => $row): ?>
                      <option value="{{ $row->id }}" >{{ $row->nombre }}</option>
                  <?php endforeach ?>
               </select>
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Moneda:</strong>
               <select name="moneda" id="" class="form-control selectpicker" data-live-search="true">
                   <option value="Dolar">Dolar</option>
                   <option value="Bolivianos">Bolivianos</option>
               </select>
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Monto:</strong>
                {!! Form::text('monto', null, array('placeholder' => 'Monto','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="fechaCreate">
             <strong>Fecha:</strong>
          {!! Form::date('fecha', \Carbon\Carbon::now()) !!}
         </div>
        </div>
        
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="fechaCreate">
             <strong>Plazo:</strong>
          {!! Form::date('plazo', \Carbon\Carbon::now()) !!}
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

