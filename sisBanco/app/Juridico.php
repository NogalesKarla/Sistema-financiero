<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Juridico extends Model
{
    use FormAccessible;
    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
     public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    protected $table = "cliente_juridico";
    public $timestamps=false;
    protected $fillable = ['id','nit','nombre_comercial','tipo_empresa','fecha_constitucion','vencimiento_poder','id_rubro'];
    protected $primaryKey = 'id';
}
