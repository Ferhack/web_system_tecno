<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AportePago extends Model
{
    protected $primaryKey = ['nro_pago','id_aporte'];
    protected $table = 'aporte_pago';
    protected $fillable = [
        'nro_pago','id_aporte', 'monto_mora'
    ];
    
    public $timestamps = false;
    public $incrementing = false;
} 