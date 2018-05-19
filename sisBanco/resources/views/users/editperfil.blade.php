@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Actualizar Datos</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.perfil') }}"> Atras</a>
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
	
	
	{!! Form::model($user, ['method' => 'PATCH','route' => ['users.updatePerfil'],'files'=>'true','enctype' => 'multipart/form-data']) !!} 
	<div class="row">
		<table class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
		<tr>
			<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
            </div>
       
        
        
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control','files'=>'true')) !!}
            </div>
        

        
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'password','class' => 'form-control')) !!}
            </div>
        
        
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
       </div>
        
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-rigth">
		 <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </td>
	
  
        <td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                
                <img src="{{asset('/storage/perfil/'.$user->foto) }}" alt="name" height="100px" width="100px" class="img-thumbnail">
            </div>
        
        
        <div class="form-group">
                  {{  csrf_field() }}
                   <strong>Foto:</strong>
                  <label for="foto"></label>
                  <input type="file" name="foto">
                  

        </div>
    </div>
   </td>
    </tr>
     </table>
     </div>
	{!! Form::close() !!}
@endsection
@section('script')
    <script>

        $(document).ready(function(){
            

        });
        function  click1(){
            document.getElementById("2").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;
        }
        function  click2(){
            document.getElementById("1").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;
            
            
        }
        function  click3(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click4(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click5(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click6(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click7(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click8(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click9(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click10(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click11(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("9").checked = false;
            document.getElementById("12").checked = false;

        }
        function  click12(){
            document.getElementById("1").checked = false;
            document.getElementById("2").checked = false;
            document.getElementById("4").checked = false;
            document.getElementById("5").checked = false;
            document.getElementById("3").checked = false;
            document.getElementById("7").checked = false;
            document.getElementById("8").checked = false;
            document.getElementById("6").checked = false;
            document.getElementById("10").checked = false;
            document.getElementById("11").checked = false;
            document.getElementById("9").checked = false;

        }
    </script>
@endsection