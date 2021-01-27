<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    protected $table = 'notificaciones';

    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'fecha',
        'grupo_id',
        'created_at'
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
