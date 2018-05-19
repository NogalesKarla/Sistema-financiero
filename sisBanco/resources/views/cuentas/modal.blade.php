<div class="modal modal-danger fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-update-{{$cuenta->nro_cuenta}}"
     style="(display: block; padding-right: 17px;)">
    {{Form::Open(array('action'=>array('CuentaController@update',$cuenta->nro_cuenta),'method'=>'update'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Modificar Estado</h4>
            </div>
            
            <div class="modal-body">
                <form>
                <input type="" name="estado" id="estado">
                <p>Confirme si desea modificar el estado</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>
            </form>

        </div>

    </div>

    {{Form::Close()}}

</div>