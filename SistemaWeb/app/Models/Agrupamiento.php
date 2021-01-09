<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agrupamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'usuario_id',
        'grupo_id'
    ];
}
