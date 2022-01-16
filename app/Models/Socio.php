<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $primaryKey = 'ci';
    protected $table = 'socio';
    protected $fillable = [
        'ci','fecha_afiliacion','nro_puesto','tipo_socio','fecha_inicio'
    ];
    public $timestamps = false;
}