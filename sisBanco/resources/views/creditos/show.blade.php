@extends('layouts.admin')

@section('content')
    <div class="row" xmlns:font-family="http://www.w3.org/1999/xhtml" xmlns:font-family="http://www.w3.org/1999/xhtml"
         xmlns:font-family="http://www.w3.org/1999/xhtml">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Informacion del Credito </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('d_credito.index') }}"> Atras</a>
                @permission('crear_garante')
                 <a class="btn btn-success" href="{{ route('garante.create',$credito->id) }}"> Registrar Nuevo Garante</a>
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
        <div class="col-sm-12" >
            <table class="table">
                
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <br> <strong>Monto:</strong>
                                {{ $credito->monto }}</br>
                                <br><strong>Moneda:</strong>
                                {{ $credito->moneda }}</br>
                                <br><strong>Fecha:</strong>
                                {{ $credito->fecha }}</br>
                                <br><strong>Plazo:</strong>
                                {{ $credito->plazo }}</br>
                                @foreach($tipocreditos as $n)
                                        @if ($n->id == $credito->id_t_cre)
                                            <br> <strong> Tipo de Credito: </strong>&nbsp;{{ $n->nombre }}</br>
                                            <br> <strong> Tasa de Interes: </strong>&nbsp;{{ $n->tasa_interes }}</br>
                                        @endif    
                                     @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                           
                      <h3>Cliente</h3>
                                @if(!empty($clientes))
                                    @foreach($clientes as $n)
                                        @if ($n->id == $credito->id_cliente)
                                            <br> <strong> Nombre del Cliente: </strong>&nbsp;{{ $n->nombre }}</br>
                                            <br> <strong> Apellido del Cliente: </strong>&nbsp;{{ $n->apellido }}</br>
                                            <br> <strong> C.I. del Cliente: </strong>&nbsp;{{ $n->ci }}</br>
                                        @endif    
                                     @endforeach
                        @endif  
                           </div>
                    </td>
                </tr>
            </table>
            <div>
          <!--   <br><h3>Informacion sobre el credito</h3>
                                    
            </div>  -->      
        
     
       

        <div class="col-sm-6 pull-right" >
            <table class="table">
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            
                            <div class="form-group">
                                <h3>Garantes</h3>
                                @if(!empty($ids))
                                    @foreach($ids as $n)
                                        @foreach($garantes as $g)
                                            @if ($n->id_garante == $g->id)
                                                <br> <strong> Nombre: </strong>&nbsp;{{ $g->nombre }}</br>
                                                <br> <strong> C.I.: </strong>&nbsp;{{ $g->ci }}</br>
                                                <br> <strong> Telefono: </strong>&nbsp;{{ $g->telefono }}</br>
                                                <br> <strong> Direccion: </strong>&nbsp;{{ $g->direccion }}</br>
                                                <br> <strong> ------------------------- </strong></br> 
                                            @endif
                                        @endforeach
                                     @endforeach
                               @endif

                                
                            </div>
                        </div>
                       
                    </td>

                </tr>
            </table>
            
        </div>
    </div>
   
    

@endsection