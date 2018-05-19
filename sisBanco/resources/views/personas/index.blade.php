@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Clientes</h2>
            </div>
            <div class="pull-right">
                 @permission('verificacion_cliente')
                <a data-target="#modal-lista" data-toggle="modal" class="btn btn-warning"> Verificacion</a>
                @endpermission
                @permission('crear_cliente')
                <a class="btn btn-success" href="{{ route('personas.create') }}"> Registrar Nueva Persona</a>
               @endpermission
            </div>
           
        </div>
    </div>
    <div class="modal fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-lista"
     style="(display: block; padding-right: 17px;)">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Lista Negra</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                <th>C.I.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                
                </tr>
             </thead>
            <tfoot>
            </tfoot>
        <tbody>
        @foreach ($listas as $key => $lista)
            <tr>
                <td>{{ $lista->ci }}</td>
                <td>{{ $lista->nombre }}</td>
                <td>{{ $lista->apellido }}</td>
                
            </tr>
            
           
        @endforeach
        </tbody>
       </table>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>

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
                <th>Id</th>
                <th>C.I.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha Nacimiento</th>
                <th>Telefono</th>
                <th>Sexo</th>
                <th>Email</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        @foreach ($personas as $key => $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->ci }}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>
                <td>{{ $persona->fecha_nac }}</td>
                <td>{{ $persona->telefono }}</td>
                
                <td>{{ $persona->sexo }}</td>
                <td>{{ $persona->email }}              
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('personas.show',$persona->id) }}">Detalles</a>
                    @permission('editar_cliente')
                    <a class="btn btn-primary" href="{{ route('personas.edit',$persona->id) }}">Modificar</a>
                    @endpermission 
                    <!--{!! Form::open(['method' => 'DELETE','route' => ['personas.destroy', $persona->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    -->
                </td>
            </tr>
            @include('personas.modal')
           
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
