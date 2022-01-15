<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $primaryKey = 'nro_ingreso';
    protected $table = 'ingreso';
    protected $fillable = [
        'nro_ingreso','detalle','fecha_ingreso', 'monto','ci_empleado'
    ];
    public $timestamps = false;
} 