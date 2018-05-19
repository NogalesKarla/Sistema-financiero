<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Persona extends Model
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
    protected $table = "persona";
    public $timestamps=false;
    protected $fillable = ['id','nombre','apellido','ci','sexo','fecha_nac','telefono','direccion','email','foto','firma','tipo'];
    protected $primaryKey = 'id';
}
