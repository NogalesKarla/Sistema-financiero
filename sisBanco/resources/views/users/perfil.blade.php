@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Perfil del Usuario</h2>
	        </div>
	        <div class="pull-right">
	        	
	            <a class="btn btn-primary" href="{{ route('users.editperfil') }}"> Actualizar Datos</a>
				<a data-target="#modal-fondo" data-toggle="modal" class="btn btn-warning">Cambiar Fondo</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
   <table  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   	<tr>
   		<td>
	<div class="form-group">
		<br><h4><b>Nombre:</b></h4>&nbsp;{{ $user->name }}</br>
		<br><h4><b>Email:</b></h4>&nbsp;{{ $user->email }}</br>
		@foreach ($rol as $key => $ro)

		<br><h4><b>Cargo:</b></h4>&nbsp;{{ $ro->nom }}</br>
		@endforeach
	</div>
	</td>
	<td>
		<br><h4><b>Foto:</b></h4></br>
		
		
		<img src="{{asset('/storage/perfil/'.$user->foto) }}" alt="name" height="180px" width="180px" class="img-thumbnail">
	</td>
	</tr>	
	</table>





<div class="modal modal fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-fondo"  style="(display: block; padding-right: 17px;)">

    {{Form::Open(array('action'=>array('UserController@updateFondo'),'method'=>'patch'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title"><strong>Cambiar Fondo</strong></h4>
            </div>
        <div class="modal-body">
            	
   	        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   		
        <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
        <a href="javascript:void(0)" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover" >
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
              
            
         </div>

         
        </a>
        <p >
        	<input type="radio" onclick="click1()"  name="fondo"  
        	id="1" value="skin-blue"  class="flat-red" > Azul</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
        	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover" name="fondo" value="skin-black" >
                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                          <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
            </a>
            <p >
                        <input type="radio" onclick="click2()" name="fondo"  id="2" value="skin-black"  class="flat-red" >Negro
                    </p>

        </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
         	
         </a>
         <p >
         		<input type="radio" onclick="click3()" name="fondo"  id="3" value="skin-purple"  class="flat-red" >Lila</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
         		<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
         		</a>
         		<p >
         		<input type="radio" onclick="click4()" name="fondo"  id="4" value="skin-green"  class="flat-red" >Verde</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
         		</a>
         		<p >
         		<input type="radio" onclick="click5()" name="fondo"  id="5" value="skin-red"  class="flat-red" >Rojo</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         	
     </div>
     </a>
     <p >
         <input type="radio" onclick="click6()" name="fondo"  id="6" value="skin-yellow"  class="flat-red" >
         Amarillo</p>
         </div>
        <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         		</div></a>
         		<p>
         		<input type="radio" onclick="click7()" name="fondo"  id="7" value="skin-blue-light"  class="flat-red" >Azul Blanco</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         	</div></a>
         	<p >
         	<input type="radio" onclick="click8()" name="fondo"  id="8" value="skin-black-light"  class="flat-red" >Negro Blanco</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         	</div>
     </a>
     <p >
         <input type="radio" onclick="click9()" name="fondo"  id="9" value="skin-purple-light"  class="flat-red" >
         Lila Blanco</p>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         </a>
         <p >
         	<input type="radio" onclick="click10()" name="fondo"  id="10" value="skin-green-light"  class="flat-red" >
         Verde Blanco</p></div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         		
         	</a>
         	<p ><input type="radio" onclick="click11()" name="fondo"  id="11" value="skin-red-light"  class="flat-red" >
         		Rojo blanco
         		</p></div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 " style="float:left; width: 33.33333%; padding: 5px;">
         	<a href="javascript:void(0)"  style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div><div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
         	</div></a>
         	<p >
         	<input type="radio" onclick="click12()" name="fondo"  id="12" value="skin-yellow-light"  class="flat-red" >Amarillo Blanco</p>
         </div>
         </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

    {{Form::Close()}}

</div>
	
	
@endsection