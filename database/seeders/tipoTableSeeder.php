<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [] ;
        array_push($data, [
            'perfil' => 'Admin',
        ]);
        array_push($data, [
            'perfil' => 'User',
        ]);
        array_push($data, [
            'perfil' => 'Repartidor',
        ]);

        DB::table('tipo')->insert($data) ;
    }
}
