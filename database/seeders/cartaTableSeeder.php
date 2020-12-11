<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class carta extends Seeder
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
            'nombre' => 'Hamburguesa con queso',
            'precio' => '7.50',
            'descripcion' => 'Hamburguesa con queso fundido'
        ]);
        array_push($data, [
            'nombre' => 'Hamburguesa de pollo con doble de queso',
            'precio' => '6.10',
            'descripcion' => 'Hamburguesa con carne de pollo'
        ]);
        array_push($data, [
            'nombre' => 'Hamburguesa vegana',
            'precio' => '7.50',
            'descripcion' => 'Deliciosa hamburguesa apta para veganos'
        ]);

        array_push($data, [
            'nombre' => 'Hamburguesa doble',
            'precio' => '10.00',
            'descripcion' => 'Una deliciosa hamburguesa con doble de carne'
        ]);


        array_push($data, [
            'nombre' => 'Perrito caliente',
            'precio' => '5.00',
            'descripcion' => 'Perrito caliente con un sabor delicado'
        ]);

        array_push($data, [
            'nombre' => 'Sandwich de queso',
            'precio' => '1.50',
            'descripcion' => 'Estupendo sandwich de queso y jamón'
        ]);

        array_push($data, [
            'nombre' => 'Nuggets',
            'precio' => '5.50',
            'descripcion' => 'Bandeja de 8 nuggets'
        ]);

        array_push($data, [
            'nombre' => 'Alitas de pollo',
            'precio' => '3.50',
            'descripcion' => 'Bandeja de 10 alitas de pollo'
        ]);

        array_push($data, [
            'nombre' => 'Patatas fritas',
            'precio' => '1.00',
            'descripcion' => 'Ración pequeña de patatas'
        ]);

        array_push($data, [
            'nombre' => 'Patatas fritas a lo grande',
            'precio' => '3.00',
            'descripcion' => 'Ración grande de patatas'
        ]);

        array_push($data, [
            'nombre' => 'Pizza 4 quesos',
            'precio' => '6.00',
            'descripcion' => 'Deliciosa pizza 4 quesos'
        ]);

        array_push($data, [
            'nombre' => 'Pizza carbonara',
            'precio' => '6.00',
            'descripcion' => 'Pizza carbonara para disfrutar con la familia'
        ]);

        array_push($data, [
            'nombre' => 'Pizza de salchichas',
            'precio' => '3.50',
            'descripcion' => 'Pizza de salchichas apta para todos'
        ]);
        
        DB::table('carta')->insert($data) ;
    }
}
