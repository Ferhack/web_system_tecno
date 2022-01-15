<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aporte extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'aporte';
    protected $fillable = [
        'id','descripcion','fecha_inicio_pago','monto','fecha_limite','porcentaje_mora'
    ];
    public $timestamps = false;
} 