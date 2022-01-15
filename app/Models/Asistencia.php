<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'asistencia';
    protected $fillable = [
        'id','fecha_actividad','actividad'
    ];
    public $timestamps = false;
} 