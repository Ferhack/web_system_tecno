<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'multa';
    protected $fillable = [
        'id','descripcion','monto'
    ];
    public $timestamps = false;
} 
