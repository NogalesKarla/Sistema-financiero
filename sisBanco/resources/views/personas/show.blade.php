@extends('layouts.admin')

@section('content')
    <div class="row" xmlns:font-family="http://www.w3.org/1999/xhtml" xmlns:font-family="http://www.w3.org/1999/xhtml"
         xmlns:font-family="http://www.w3.org/1999/xhtml">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informacion Personal </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('personas.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-6" >
            <table >
                 <tr>
                    <td>
                        <strong>Foto:</strong>
                        <img src="{{asset('/storage/upload/'.$persona->foto) }}" alt="{{$persona->nombre}}" height="100px" width="100px" class="img-thumbnail">
                    </td>
                    <td >
                        <strong>Firma:</strong>
                        <img src="{{asset('/storage/upload/'.$persona->firma) }}" alt="{{$persona->nombre}}" height="100px" width="100px" class="img-thumbnail">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <br> <strong>Nombre:</strong>
                                {{ $persona->nombre }}</br>
                                <br><strong>Apellido:</strong>
                                {{ $persona->apellido }}</br>
                                <br><strong>Ci:</strong>
                                {{ $persona->ci }}</br>
                                <br><strong>Telefono:</strong>
                                {{ $persona->telefono }}</br>
                                <br><strong>Fecha de Nacimiento:</strong>
                                {{ $persona->fecha_nac }}</br>
                                <br><strong>Sexo:</strong>
                                {{ $persona->sexo }}</br>
                                <br><strong>Direccion:</strong>
                                {{ $persona->direccion }}</br>
                                <br><strong>Tipo:</strong>
                                {{$persona->tipo}}
                                </br>
                                
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6" >
            <table>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if(!empty($ocupacion))
                                    @foreach($ocupacion as $n)
                                        <br> <strong> Ocupacion: </strong>&nbsp;{{ $n->nombre }}</br>
                                     @endforeach
                                @endif
                                @if(!empty($natural))
                                    @foreach($natural as $n)
                                        <br> <strong> Nombre de la institucion de trabajo: </strong>&nbsp;{{ $n->nom_empleo }}</br>
                                        <br> <strong> Direccion de la institucion de trabajo: </strong>&nbsp;{{ $n->dir_empleo }}</br>
                                     @endforeach
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if(!empty($juridico))
                                    @foreach($juridico as $j)
                                        <br> <strong>Nit:</strong>&nbsp;{{ $j->nit }}</br>
                                        <br><strong>Nombre Comercial:</strong>&nbsp;{{ $j->nombre_comercial }}</br>
                                        <br><strong>Tipo Empresa:</strong>&nbsp;{{ $j->tipo_empresa }}</br>
                                        <br><strong>Fecha Constitucion:</strong>&nbsp;{{ $j->fecha_constitucion }}</br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        
                       
                        

                    </td>

                </tr>
            </table>
            
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cuentas del cliente</h2>
            </div>
            <div class="pull-right">
                @permission('crear-cuenta')
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#opcionesApertura">Aperturar Cuenta</button>
                @endpermission
            </div>
            <tr>
                <td>
                    <!-- Modal -->
                    <div class="modal fade" id="opcionesApertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalLabel" style="text-align: left; font-family:'Times New Roman';">Elija el tipo de cuenta
                                    <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                    </button>
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <table>
                                    <tr>
                                        <td>
                                            <a href="{{route('cuentaahorro',$persona->id)}}">
                                                <img src="{{asset('storage/upload/ahorro.jpg') }}" height="140px" width="140px" class="img-thumbnail">
                                            </a>

                                        </td>
                                        <td>
                                            <h3 style="text-align: center; font-family:'Times New Roman';">CUENTA DE AHORRO</h3>
                                            <p style="text-align: center ; font-family:'Times New Roman';">La Caja de Ahorro es un producto de captación,</p>
                                            <p style="text-align: center ; font-family:'Times New Roman'"> que permite realizar depósitos y retiros de dinero</p>
                                            <p style="text-align: center ; font-family:'Times New Roman'"> y cuyos saldos devengan intereses diarios.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{route('cuentacorriente',$persona->id)}}" >
                                                <img src="{{asset('storage/upload/chequera.jpg') }}"height="140px" width="140px" class="img-thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <h3 style="text-align: center; font-family:'Times New Roman';">CUENTA CORRIENTE</h3>
                                            <p style="text-align: center ;font-family:'Times New Roman';">La Cuenta Corriente es un producto de captación</p>
                                            <p style="text-align: center ;font-family:'Times New Roman';"> y medio de pago, que recibe depósitos y permite</p>
                                            <p style="text-align: center ;font-family:'Times New Roman';"> retiros mediante el giro de cheques.</p>

                                        </td>
                                    </tr>
                                        <tr>
                                        <td>
                                          <a href="{{route('cuentadeposito',$persona->id)}}">
                                                <img src="{{asset('storage/upload/deposito_fijo.jpg') }}" height="140px" width="140px" class="img-thumbnail">
                                         </a> 

                                        </td>
                                            <td>
                                                <h3 style="text-align: center; font-family:'Times New Roman';">  DEPOSITO A PLAZO FIJO</h3>
                                                <p style="text-align: center ;font-family:'Times New Roman';">Son depositos que se realizan a un plazo fijo recibe</p>
                                                <p style="text-align: center ;font-family:'Times New Roman';"> interes mayores a los de la cuenta ahorro,</p>
                                                <p style="text-align: center ;font-family:'Times New Roman';">son de acuerdo al monto y tiempo de permanecia.</p>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%" >
        <thead>
        <tr>
            <th>Nro Cuenta</th>
            <th>Fecha de Apertura</th>
            <th>Moneda</th>
            <th>Tipo de cuenta</th>
            <th>Estado</th>
           <!-- <th width="280px">Action</th>-->
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            @foreach ($cuentas as $key => $cuenta)
                <tr>
                    <td>{{ $cuenta->nro_cuenta }}</td>
                    <td>{{ $cuenta->fecha_apertura }}</td>
                    <td>{{ $cuenta->moneda }}</td>
                    <td>{{ $cuenta->tipo }}</td>
                    <td>{{ $cuenta->estado }}</td>
                
                </tr>
           
            @endforeach
        </tbody>


        
    </table>

    
    

@endsection