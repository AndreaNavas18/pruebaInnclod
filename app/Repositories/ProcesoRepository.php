<?php

namespace App\Repositories;

use App\Models\Proceso;

class ProcesoRepository
{
    public function getAll()
    {
        return Proceso::all();
    }

    public function findById($id)
    {
        return Proceso::find($id);
    }
}
