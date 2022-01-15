<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultaPago extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'multa_pago';
    protected $fillable = [
        'id','nro_pago','id_multa'
    ];
    public $timestamps = false;
} 