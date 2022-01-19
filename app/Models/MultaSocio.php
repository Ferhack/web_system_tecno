<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultaSocio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'multa_socio';
    protected $fillable = [
        'id', 'ci_socio', 'id_multa'
    ];
    public $timestamps = false;
}
