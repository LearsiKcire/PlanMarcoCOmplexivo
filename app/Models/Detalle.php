<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento_id',
        'objetivo_id',
        'otrosObjetivos',
        'nivelEsperado',
        'nivelAlcanzado',
        'tarea',
        'area',
        'numeroSemana',
        'responsable',
    ];
}
