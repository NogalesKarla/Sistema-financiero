<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = "cuenta";
    protected $fillable = ['nro_cuenta','monto_apertura','fecha_apertura','tipo','moneda', 'estado', 'id_user'];
    public $timestamps=false;
    protected $primaryKey = 'nro_cuenta';

}
