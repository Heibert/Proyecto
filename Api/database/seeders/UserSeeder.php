<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = 'admin';
        $u->apellido = 'admin';
        $u->telefono = '12345';
        $u->email = 'admin@gmail.com';
        $u->password = '12345';
        $u->rol = 'admin';
        $u->save();
    }
       
}
