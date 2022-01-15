<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $primaryKey = 'nro_egreso';
    protected $table = 'egreso';
    protected $fillable = [
        'nro_egreso','detalle','fecha_egreso', 'actor_receptor','ci_empleado'
    ];
    public $timestamps = false;
} 
