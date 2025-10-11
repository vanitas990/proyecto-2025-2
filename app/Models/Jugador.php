<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    // 👇 Esto le dice explícitamente el nombre correcto de la tabla
    protected $table = 'jugadores';

    // (Opcional) Si quieres, puedes definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'rol',
    ];
}
