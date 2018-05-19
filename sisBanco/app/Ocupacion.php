<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Ocupacion extends Model
{
    protected $table = "ocupacion";
    public $timestamps=false;
    protected $fillable = ['id','nombre'];
    protected $primaryKey = 'id';
}
