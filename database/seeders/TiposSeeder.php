<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tip_tipo_doc;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creo los procesos por seeder 
        $tipos = [
            ['tip_nombre' => 'Manual', 'tip_prefijo' => 'MAN'],
            ['tip_nombre' => 'Reporte', 'tip_prefijo' => 'REP'],
            ['tip_nombre' => 'Factura', 'tip_prefijo' => 'FAC'],
            ['tip_nombre' => 'Instructivo', 'tip_prefijo' => 'INS'],
            ['tip_nombre' => 'Contrato', 'tip_prefijo' => 'CON'],
        ];

        foreach($tipos as $tipo) {
            Tip_tipo_doc::create($tipo);
        }
    }
}
