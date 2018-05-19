@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Listado de Usuarios</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('crear_usuario')
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear nuevo Usuario</a>
				@endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>Nro</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th width="280px">Opciones</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->nom))
				
					<label class="label label-success">{{ $user->nom }}</label>
				
			@endif
		</td>
		<td>
		<!--	<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>-->
		@permission('editar_usuario')
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modificar</a>
			@endpermission
 <!--
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}-->
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection