<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class alergenos extends Seeder
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
            'nombre' => 'Altramuces',
            'imagen' => '1606329860altramuces.png'
        ]);
        array_push($data, [
            'nombre' => 'Apio',
            'imagen' => '1607525529apio.png'
        ]);
        array_push($data, [
            'nombre' => 'Cacahuetes',
            'imagen' => '1606329869cacahuetes.png'
        ]);

        array_push($data, [
            'nombre' => 'Crustaceos',
            'imagen' => '1606345515crustaceos.png'
        ]);


        array_push($data, [
            'nombre' => 'Dioxido de azufre y sulfritos',
            'imagen' => '1606515679dioxido de azufre y sulfitos.png'
        ]);

        array_push($data, [
            'nombre' => 'Frutos con cascara',
            'imagen' => '1607525564frutos de cascara.png'
        ]);

        array_push($data, [
            'nombre' => 'Gluten',
            'imagen' => '1606378325gluten.png'
        ]);

        array_push($data, [
            'nombre' => 'Granos de sesamo',
            'imagen' => '1606430591granos de sesamo.png'
        ]);

        array_push($data, [
            'nombre' => 'Huevos',
            'imagen' => '1607525591huevos.png'
        ]);

        array_push($data, [
            'nombre' => 'Lacteos',
            'imagen' => '1607525614lacteos.png'
        ]);

        array_push($data, [
            'nombre' => 'Moluscos',
            'imagen' => '1607525637moluscos.png'
        ]);

        array_push($data, [
            'nombre' => 'Mostaza',
            'imagen' => '1606331447mostaza.png'
        ]);

        array_push($data, [
            'nombre' => 'Pescado',
            'imagen' => '1607525661pescado.png'
        ]);

        array_push($data, [
            'nombre' => 'Soja',
            'imagen' => '1607525680soja.png'
        ]);
        
        DB::table('alergenos')->insert($data) ;
    }
}
