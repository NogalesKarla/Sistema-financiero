<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositoFijo extends Model
{
    protected $table = "deposito_fijo";
    protected $fillable = ['nro_cuenta','tasa','plazo'];
    public $timestamps=false;
    protected $primaryKey = 'nro_cuenta';
}
