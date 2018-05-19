@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Tipos de Creditos</h2>
            </div>
            <div class="pull-right">
                 
                <a class="btn btn-success" href="{{ route('t_credito.create') }}"> Registrar Tipo de Credito</a>
               
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row">
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="table-responsive">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Tasa de Interes</th>
                <th>Descripcion</th>

              <!--  <th width="280px">Opciones</th>-->
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php $nro=1 ?>
        @foreach ($creditos as $key => $row)
            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->tasa_interes }}</td>
                <td>{{ $row->descripcion }}</td>
                
              <!--  <td>
                    <a class="btn btn-info" href="{{ route('t_credito.show',$row->id) }}">Detalles</a>
                    <a class="btn btn-primary" href="{{ route('t_credito.edit',$row->id) }}">Modificar</a>
                     
                </td>-->
            </tr>
        <?php $nro++ ?>
           
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
