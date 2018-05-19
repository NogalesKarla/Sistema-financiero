@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de de Creditos</h2>
            </div>
            <div class="pull-right">
                @permission('crear_credito')
                <a class="btn btn-success" href="{{ route('d_credito.create') }}"> Registrar Nuevo Credito</a>
               @endpermission
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
                <th>Monto</th>
                <th>Moneda</th>
                <th>Fecha</th>
                <th>Plazo</th>
                <th>Cliente</th>


                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php $nro=1 ?>
        @foreach ($creditos as $key => $row)
            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->monto }}</td>
                <td>{{ $row->moneda }}</td>
                <td>{{ $row->fecha }}</td>
                <td>{{ $row->plazo }}</td>
                <td>
                @foreach ($clientes as $key => $cliente)
                    @if($row->id_cliente == $cliente->id)
                        {{ $cliente->nombre }}
                    @endif    
                @endforeach
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('d_credito.show',$row->id) }}">Detalles</a>
                  <!--  <a class="btn btn-primary" href="{{ route('d_credito.edit',$row->id) }}">Modificar</a>-->
                     
                </td>
            </tr>
        <?php $nro++ ?>
           
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
