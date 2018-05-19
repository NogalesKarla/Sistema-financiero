<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Cuenta extends Model
{
    protected $table = "detalle_cuenta";
    protected $fillable = ['id','nro_cuenta','id_persona'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
