<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaSocio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'asistencia_socio';
    protected $fillable = [
        'id', 'ci_socio', 'id_asistencia'
    ];
    public $timestamps = false;
}
