<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion'
    ];

    public function miembros() {
        return $this->hasMany(Agrupamiento::class, 'grupo_id', 'id');
    }
}
