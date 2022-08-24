<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tematica;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new Tematica();
        $u->nombreTematica = "Biologia";
        $u->instructor_id = "1";
        $u->programa_id = "1";
        $u->ficha_id = "1";
        $u->save();
    }
}
