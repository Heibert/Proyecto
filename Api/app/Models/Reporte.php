<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aprendiz;

class Reporte extends Model
{
    use HasFactory;

    // Relacion con instructor (m:1)

    public function instructores(){
        return $this->belongsTo(Instructor::class, 'id_instructor');
    }

    // Relacion con coordinador (m:1)

    public function coordinadores(){
        return $this->belongsTo(Coordinador::class, 'id_coordinador');
    }

    public function aprendices(){
        return $this->belongsTo(Aprendiz::class, 'id_aprendiz');
    }
    
}
