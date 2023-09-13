<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ["nombre", "descripcion", "precio", "creado", "terminado", "disponible", "foto1", "foto2", "foto3", "foto4"];
}
