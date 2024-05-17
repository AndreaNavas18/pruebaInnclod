<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pro_proceso;

class ProcesosSeeder extends Seeder
{
    public function run()
    {
        //Creo los procesos por seeder 
        $procesos = [
            ['pro_nombre' => 'Ingenieria', 'pro_prefijo' => 'ING'],
            ['pro_nombre' => 'Produccion', 'pro_prefijo' => 'PRO'],
            ['pro_nombre' => 'Investigacion', 'pro_prefijo' => 'INV'],
            ['pro_nombre' => 'Desarrollo', 'pro_prefijo' => 'DES'],
            ['pro_nombre' => 'Logistica', 'pro_prefijo' => 'LOG'],  
        ];

        foreach($procesos as $proceso) {
            Pro_proceso::create($proceso);
        }

    }
}

