<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $primaryKey = 'nro_pago';
    protected $table = 'pago';
    protected $fillable = [
        'nro_pago','fecha_pago','monto_total','comprobante','ci_empleado','ci_socio'
    ];
    public $timestamps = false;
} 