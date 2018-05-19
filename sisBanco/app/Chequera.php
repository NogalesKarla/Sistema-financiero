<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;


class Chequera extends Model
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
    protected $table = "chequera";
    protected $fillable = ['nro_chequera','fecha_expiracion','cantidad','precio_talonario','estado','nro_cuenta'];
    public $timestamps=false;
    protected $primaryKey = 'nro_chequera';
}