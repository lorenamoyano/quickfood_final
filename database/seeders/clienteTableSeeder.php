<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;

class cliente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create('es_ES');
        $data = [];
        array_push($data, [
            'nombre' => 'Lorena',
            'apellido1' => 'Moyano',
            'apellido2' => 'Montes',
            'dni' => '34587521B',
            'telefono' => '666111222',
            'email' => 'lorenamoyanomontes1991@gmail.com',
            'password' => Hash::make('Lorena.1991'),
            'ciudad' => 'Málaga',
            'perfil' => '1',
            'avatar' => null,
        ]);
        for ($i = 1; $i <= 10; $i++) {
            $dni = $faker->numberBetween(00000000, 99999999) . $faker->randomLetter();
            array_push($data, [
                'nombre' => $faker->name(),
                'apellido1' => $faker->lastName(),
                'apellido2' => $faker->lastName(),
                'dni' => $dni,
                'telefono' => $faker->numberBetween(600000000, 799999999),
                'email' => $faker->freeEmail(),
                'password' => Hash::make('Lorena.1991'),
                'ciudad' => $faker->city(),
                'perfil' => '2',
                'avatar' => null,
            ]);
        }

        DB::table('cliente')->insert($data);
    }
}
