<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Cuenta extends Model
{
    protected $table = "cliente_cuenta";
    protected $fillable = ['id_cliente','id_cuenta'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
