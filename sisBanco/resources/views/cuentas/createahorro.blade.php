@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear nueva cuenta de ahorro</h2>
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
    {!! Form::open(array('route' =>[ 'cuentaahorro.store',$id],'method'=>'POST','files'=>'true')) !!}
    <div class="row">
        <div class="col-sm-6" >
            <table class="table">
                <tr>
                    <td>
                        <div id="tipoDeCuentaGlobal">
                            <label>
                                Cuenta Global
                                <input type="radio" onclick="resetearOnClick()" name="tipo" id="global" value="Global"  class="flat-red" >
                            </label>
                        </div>

                    </td>

                    <td>
                        <div id="tipoDeCuentaEficaz" >
                            <label>
                                Cuenta Eficaz
                                <input type="radio"  onclick="resetearOnClick()" name="tipo" id="eficaz" value="Eficaz"  class="flat-red" >
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="tipoDeCuentaJoven">
                            <label>
                                Cuenta Banca Joven
                                <input type="radio" onclick="resetearOnClick()" name="tipo" id="joven" value="Joven"  class="flat-red" >
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td >
                        <div id="tipoDeMonedaBolivianos">
                            <label>
                                Bolivianos
                                <input type="radio" onclick="clickCalcularMontoApertura()" name="moneda" id="boli" value="bolivianos"  class="flat-red" >
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="tipoDeMonedaDolares">
                            <label>
                                Dolares
                                <input type="radio" onclick="clickCalcularMontoApertura()"  name="moneda" id="dolares" value="dolares"  class="flat-red" >
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nombre">Monto de apertura : </label>
                    </td>
                    <td>
                        <input id="monto123" type="text" size="4" name="monto" readonly style="border:none"   value="0.0">

                    </td>
                    <td style="text-align-all: left;">
                        <p id="sign"></p>

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
        <div class="col-sm-6" >
            <table class="table">
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h3 style="text-align: center; font-family:'Times New Roman';">Rango de Interes</h3>

                        </div>
                    </td>
                </tr>
                <td style="text-align: center">
                    <img src="{{asset('storage/upload/jovenInteresBolivianos.jpg') }}" height="300px" width="300px" id="jovenInteresBolivianos" style="display: none" class="img-thumbnail">
                    <img src="{{asset('storage/upload/eficazInteresBolivianos.jpg') }}" height="300px" width="300px" id="eficazInteresBolivianos" style="display: none" class="img-thumbnail">
                    <img src="{{asset('storage/upload/globalInteresBolivianos.jpg') }}" height="300px" width="300px" id="globalInteresBolivianos" style="display: none" class="img-thumbnail">
                    <img src="{{asset('storage/upload/globalInteresDolares.jpg') }}" height="300px" width="300px"  id="globalInteresDolares" style="display: none" class="img-thumbnail">
                </td>
            </table>
        </div>

    </div>


    {!! Form::close() !!}


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            tipo = document.getElementById("tipo");
            demo.innerHTML = tipo.textContent;
            if(tipo.textContent == "juridico"){
                tipoDeCuentaEficaz.style.display ='none';
                tipoDeCuentaJoven.style.display = 'none';
            }
        });

        function resetearOnClick(){
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            eficazz = document.getElementById("eficaz");
            global = document.getElementById("global");
            joven = document.getElementById("joven");
            s = document.getElementById("sign");
            if(global.checked ){
                document.getElementById("monto123").value = "0.0";
                document.getElementById("porcentaje123").value = "0.0%";
                document.getElementById("dolares").checked = false;
                document.getElementById("boli").checked = false;
                document.getElementById("tipoDeMonedaDolares").style.display = "";
                s.innerHTML = "";
                document.getElementById("globalInteresBolivianos").style.display = "none";
                document.getElementById("globalInteresDolares").style.display = "none";
                document.getElementById("jovenInteresBolivianos").style.display = "none";
                document.getElementById("eficazInteresBolivianos").style.display = "none";
            }
            if(eficazz.checked ){
                document.getElementById("tipoDeMonedaDolares").style.display = "none";
                document.getElementById("monto123").value = "0.0";
                document.getElementById("porcentaje123").value = "0.0%";
                document.getElementById("dolares").checked = false;
                document.getElementById("boli").checked = false;
                s.innerHTML = "";
                document.getElementById("globalInteresBolivianos").style.display = "none";
                document.getElementById("globalInteresDolares").style.display = "none";
                document.getElementById("jovenInteresBolivianos").style.display = "none";
                document.getElementById("eficazInteresBolivianos").style.display = "none";
            }
            if(joven.checked ){
                document.getElementById("tipoDeMonedaDolares").style.display = 'none';
                document.getElementById("monto123").value = "0.0";
                document.getElementById("porcentaje123").value = "0.0%";
                document.getElementById("dolares").checked = false;
                document.getElementById("boli").checked = false;
                s.innerHTML = "";
                document.getElementById("globalInteresBolivianos").style.display = "none";
                document.getElementById("globalInteresDolares").style.display = "none";
                document.getElementById("jovenInteresBolivianos").style.display = "none";
                document.getElementById("eficazInteresBolivianos").style.display = "none";
            }

        }
        function clickCalcularMontoApertura(){
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            eficazz = document.getElementById("eficaz");
            global = document.getElementById("global");
            joven = document.getElementById("joven");
            s = document.getElementById("sign");
            if(tipo.textContent == 'juridico'){
                if(global.checked && boli.checked){
                    document.getElementById("monto123").value = "200";
                    document.getElementById("porcentaje123").value = "2.0%";
                    s.innerHTML = "BS";
                    document.getElementById("globalInteresBolivianos").style.display = "";
                    document.getElementById("globalInteresDolares").style.display = "none";

                }
                if(global.checked && dolares.checked){
                    document.getElementById("monto123").value = "50";
                    document.getElementById("porcentaje123").value = "0.10%";
                    s.innerHTML = "USD";
                    document.getElementById("globalInteresDolares").style.display = "";
                    document.getElementById("globalInteresBolivianos").style.display = "none";
                }
            }else{
                if(global.checked && boli.checked){
                    document.getElementById("monto123").value = "200";
                    document.getElementById("porcentaje123").value = "2.0%";
                    s.innerHTML = "BS";
                    document.getElementById("globalInteresBolivianos").style.display = "";
                    document.getElementById("globalInteresDolares").style.display = "none";
                }
                if(global.checked && dolares.checked){
                    document.getElementById("monto123").value = "50";
                    document.getElementById("porcentaje123").value = "0.10%";
                    s.innerHTML = "USD";
                    document.getElementById("globalInteresDolares").style.display = "";
                    document.getElementById("globalInteresBolivianos").style.display = "none";
                }
                if(eficazz.checked && boli.checked){
                    document.getElementById("monto123").value = "200";
                    document.getElementById("porcentaje123").value = "3.0%";
                    s.innerHTML = "BS";
                    document.getElementById("eficazInteresBolivianos").style.display = "";
                }
                if(joven.checked && boli.checked){
                    document.getElementById("monto123").value = "0";
                    document.getElementById("porcentaje123").value = "3.0%";
                    s.innerHTML = "BS";
                    document.getElementById("jovenInteresBolivianos").style.display = "";
                }
            }

        }
    </script>
@endsection
