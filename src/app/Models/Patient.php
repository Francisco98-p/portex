<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'apellidos',
        'nombres',
        'dni',
        'nacimiento',
        'sexo',
        'telefono',
        'email',
        'direccion',
        'observaciones',
    ];
}
