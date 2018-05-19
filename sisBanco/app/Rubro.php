<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Rubro extends Model
{
     protected $table = "rubro";
    public $timestamps=false;
    protected $fillable = ['id','nombre'];
    protected $primaryKey = 'id';
}
