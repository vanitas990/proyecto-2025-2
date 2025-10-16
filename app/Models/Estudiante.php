<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'codigo',
        'nombres',
        'pri_ape',
        'seg_ape',
        'dni'
    ];

    // Campos que deben ser ocultos en las respuestas JSON
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
