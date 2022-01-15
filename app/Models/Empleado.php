<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{ 
    protected $primaryKey = 'ci';
    protected $table = 'empleado';
    protected $fillable = [
        'ci','fecha_inicio','fecha_fin'
    ];
    public $timestamps = false;
}