<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

     // Relacion con ficha (m:m)

     public function fichas(){
        return $this->belongsToMany(Ficha::class, 'instructor:ficha');
    }

    // Relacion con tematica (1:m)

    public function tematicas(){
        return $this->hasMany(Tematica::class, 'id');
    }

    // Relacion con programa (m:1)

    public function programas(){
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    // Relacion con reporte (1:m)

    public function reportes(){
        return $this->hasMany(Reporte::class, 'id');
    }
}
