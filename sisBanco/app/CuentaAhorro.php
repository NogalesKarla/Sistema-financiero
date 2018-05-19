<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaAhorro extends Model
{
    protected $table = "cuenta_ahorro";
    protected $fillable = ['nro_cuenta','tasa'];
    public $timestamps=false;
    protected $primaryKey = 'nro_cuenta';

}
