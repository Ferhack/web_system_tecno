<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AportePago extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'aporte_pago';
    protected $fillable = [
        'id','nro_pago','id_aporte'
    ];
    public $timestamps = false;
} 