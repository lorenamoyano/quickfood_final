<?php

namespace Database\Seeders;

use App\Models\Alergenos_carta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            tipo::class,
            cliente::class,
            alergenos::class,
            carta::class,
        ]);
    }
}

