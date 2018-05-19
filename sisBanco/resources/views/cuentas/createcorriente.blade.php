@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear nueva cuenta corriente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('personas.show',['id'=>$id]) }}"> Back </a>
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
    {!! Form::open(array('route' =>[ 'cuentacorriente.store',$id],'method'=>'POST','files'=>'true')) !!}
    <div class="row">
        <div class="col-sm-6">
            <h3>Detalle general de cuenta corriente</h3>
            <table class="table">
                <tr>
                    <td>
                        <label>
                            Dolares
                            <input type="radio" onclick="calcularMontoCuentaCorriente()"  name="moneda" id="dolares" value="dolares"  class="flat-red" >

                        </label>
                    </td>
                    <td >
                        <label>
                            Bolivianos
                            <input type="radio" onclick="calcularMontoCuentaCorriente()" name="moneda" id="boli" value="bolivianos"  class="flat-red" >
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre">Monto de apertura : </label>
                    </td>
                    <td>
                        <input id="monto123" type="text" size="4" name="monto" readonly style="border:none"   value="0.0">
                    </td>
                    <td>
                        <p id="sign" style="text-align: left">..</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6" >
            <h3>Detalle de chequera</h3>
            <table class="table">
                <tr>
                    <td>
                        <label>
                            Cantidad de cheques en talonario:
                        </label>
                    </td>
                    <td>
                        <input type="radio" onclick="calcularPrecioTalonario()"  name="cantidadTalonario" id="veinte" value="20"  class="flat-red" >20 unidades
                    </td>
                    <td>
                        <input type="radio" onclick="calcularPrecioTalonario()"  name="cantidadTalonario" id="treinta" value="30"  class="flat-red" >30 unidades
                    </td>
                    <td>
                        <input type="radio" onclick="calcularPrecioTalonario()"  name="cantidadTalonario" id="cincuenta" value="50"  class="flat-red" >50 unidades
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre">Precio del talonario : </label>
                    </td>
                    <td>
                        <input id="precioTalonario" type="text" size="4" name="precioTalonario" readonly style="border:none"   value="0.0">
                        <input id="tipoCuentaCorriente" type="text" name="tipo" readonly style="display: none"   value="Corriente">
                    </td>
                    <td>
                        <p style="text-align: left" id="sig">..</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Fecha de Expiracion :
                        </label>
                    </td>
                    <td><!--//\Carbon\Carbon::now())-->
                        {!! Form::date('fecha_expiracion', \Carbon\Carbon::now()) !!}
                    </td>
                </tr>

            </table>
        </div>
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
            formularioAhorro.style.display = 'none';
            formularioCorriente.style.display = 'none';
            formularioSeguridad.style.display = 'none';
        });
        function calcularMontoCuentaCorriente() {
            boli = document.getElementById("boli");
            dolares = document.getElementById("dolares");
            s = document.getElementById("sign");
            if(boli.checked){
                document.getElementById("monto123").value = "700";
                s.innerHTML = "BS";
            }
            if(dolares.checked){
                document.getElementById("monto123").value = "100";
                s.innerHTML = "USD";
            }
        }
        function calcularPrecioTalonario() {
            veinte = document.getElementById("veinte");
            treinta = document.getElementById("treinta");
            cincuenta = document.getElementById("cincuenta");

            if(veinte.checked){
                document.getElementById("precioTalonario").value = "100";
                document.getElementById("sig").innerHTML = "BS"
            }
            if(treinta.checked){
                document.getElementById("precioTalonario").value = "170";
                document.getElementById("sig").innerHTML = "BS"
            }
            if(cincuenta.checked){
                document.getElementById("precioTalonario").value = "220";
                document.getElementById("sig").innerHTML = "BS"
            }
        }

    </script>
@endsection
