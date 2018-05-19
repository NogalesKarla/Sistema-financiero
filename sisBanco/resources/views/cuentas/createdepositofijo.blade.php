@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear nueva cuenta de deposito a plazo fijo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('personas.show',['id'=>$id]) }}"> Atras </a>

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
    {!! Form::open(array('route' =>[ 'cuentadeposito.store',$id],'method'=>'POST','files'=>'true')) !!}
    <div class="row">
        <div class="col-sm-6" >
            <table >
                
                <tr>
                    <td >
                        <div id="tipoDeMonedaBolivianos">
                            <label>
                                Bolivianos
                                <input type="radio" onclick="resetearOnClick()" name="moneda" id="boli" value="bolivianos"  class="flat-red" >
                                <input id="tipoCuentaDepositoFijo" type="text" name="tipo" readonly style="display: none"   value="DepositoFijo"> 
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="tipoDeMonedaDolares">
                            <label>
                                Dolares
                                <input type="radio" onclick="resetearOnClick()"  name="moneda" id="dolares" value="dolares"  class="flat-red" >
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nombre">Monto de apertura :&nbsp; &nbsp;</label>
                    </td>
                    <td>
                       <input type="text" name="monto"  id="monto" class="form-control">
                       <!--<button onclick="calcular()"  class="btn-xs">Calcular</button>-->
                        <p></p>
                        
                    </td>
                    <td style="text-align-all: left;">
                        <p id="sign"></p>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre">Plazo : </label>
                    </td>
                    <td>
                     <div id="plazodolar">
                        <select name="plazo" id="plazod" onchange="calcularInteres(this.value)" class="form-control selectpicker" data-live-search="true">
                    
                        <option value="30"> 30 </option>
                        <option value="240"> 240 </option>
                        <option value="450"> 450 </option>
                        
                        </select>
                    </div>
                    <div id="plazoboli">
                        <select name="plazo" onchange="calcularInter(this.value)"   class="form-control selectpicker" data-live-search="true">
                    
                        <option value="30"> 30 </option>
                        <option value="240"> 240 </option>
                       
                        <option value="2520"> 2520 </option>
                         <option value="6120"> 6120 </option>
                        </select>
                        
                       </div> 
                    </td>
                    <td style="text-align-all: left;">
                       &nbsp; Dias

                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nombre">Tasa de interes : </label>
                    </td>
                    <td>
                        <input id="porcentaje123" type="text" size="4"  name="porcentaje" readonly style="border:none" value="0.0%">
                        

                    </td>
                    <td>
                        <p id="tipo" style="visibility: hidden">{{$persona->tipo}}</p>
                        <p id="demo" style="visibility: hidden">hola</p>
                    </td>
                </tr>

            </table>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
        

    </div>


    {!! Form::close() !!}


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            //boli = document.getElementById("boli");
            //dolar = document.getElementById("dolares"); 
            
            document.getElementById("plazodolar").style.display = "none";
            document.getElementById("plazoboli").style.display = "none";

            
        });
        function resetearOnClick(){
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            
                        
            if(boli.checked ){
                
                document.getElementById("dolares").checked = false;
                document.getElementById("plazodolar").style.display = "none";
                document.getElementById("plazoboli").style.display = "";
                
            }
            if(dolares.checked ){
                
                document.getElementById("boli").checked = false;
                document.getElementById("plazodolar").style.display = "";
                document.getElementById("plazoboli").style.display = "none";
                
            }

            

        }
        function calcularInteres(arg){
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            monto = document.getElementById("monto");
            
           // var porId=document.getElementById("plazod").val();
           // document.getElementById("hola").innerHTML=porId;
           if(arg==30){
            document.getElementById("porcentaje123").value = "0.010%";
            }
            if(arg==240){
            document.getElementById("porcentaje123").value = "0.13%";
            }
            if(arg==450){
            document.getElementById("porcentaje123").value = "0.01%";
            }
        }

        
        function calcularInter(arg){
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            monto = document.getElementById("monto").value;
            
           // var porId=document.getElementById("plazod").val();
            //document.getElementById("hola").value=monto;
           if(arg==30){
            document.getElementById("porcentaje123").value = "0.18%";
            }
            if(arg==240){
            document.getElementById("porcentaje123").value = "2.99%";
            }
            if(arg==2520){
            document.getElementById("porcentaje123").value = "4.10%";
            }
            if(arg==6120){
            document.getElementById("porcentaje123").value = "4.85%";
            }
        }

       
    </script>
@endsection
