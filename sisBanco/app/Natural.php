<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Natural extends Model
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
    protected $table = "cliente_natural";
    public $timestamps=false;
    protected $fillable = ['id','nom_empleo','dir_empleo','id_ocupacion'];
    protected $primaryKey = 'id';
}
