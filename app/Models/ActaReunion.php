<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaReunion extends Model
{
    protected $primaryKey = 'nro_acta';
    protected $table = 'acta_reunion';
    protected $fillable = [
        'nro_acta','fecha_reunion','descripcion','ci_empleado'
    ];
    public $timestamps = false;
} 
