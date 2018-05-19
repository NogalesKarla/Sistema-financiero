<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
class ListaNegra extends Model
{
    protected $table = "lista_negra";
    public $timestamps=false;
    protected $fillable = ['id','ci','nombre','apellido'];
    protected $primaryKey = 'id';
}
