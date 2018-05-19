@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cuentas</h2>
            </div>
            <div class="pull-right">
                
               
               
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
                <th>Nro de Cuenta</th>
                <th>Estado</th>
                <th>Monto de apertura</th>
                <th>Fecha de apertura</th>
                <th>Tipo</th>
                <th>Moneda</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($cuentas as $key => $cuenta)
            <tr>
                <td>{{ $cuenta->nro_cuenta }}</td>
                <td>{{ $cuenta->estado }}</td>
                <td>{{ $cuenta->monto_apertura }}</td>
                <td>{{ $cuenta->fecha_apertura }}</td>
                <td>{{ $cuenta->tipo }}</td>
                <td>{{ $cuenta->moneda }}</td>           
                </td>
                <td>
                	
                <!--	<a href="" data-target="#modal-update-{{$cuenta->nro_cuenta}}" data-toggle="modal" class="btn btn-primary">Modificar Estado</a>-->

            
                </td>
            </tr>
            @include('cuentas.modal')           
           
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
