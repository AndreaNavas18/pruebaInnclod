<?php

namespace App\Repositories;

use App\Models\TipoDocumento;

class TipoDocumentoRepository
{
    public function getAll()
    {
        return TipoDocumento::all();
    }

    public function findById($id)
    {
        return TipoDocumento::find($id);
    }
}
