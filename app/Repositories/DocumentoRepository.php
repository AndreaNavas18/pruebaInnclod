<?php

namespace App\Repositories;

use App\Models\Documento;
use Illuminate\Support\Facades\DB;

class DocumentoRepository implements DocumentoRepoInterfaz
{
    public function getAll()
    {
        return Documento::all();
    }

    public function findById($id)
    {
        return Documento::find($id);
    }

    public function create(array $data)
    {
        return Documento::create($data);
    }

    public function update($id, array $data)
    {
        $documento = Documento::findOrFail($id);
        $documento->update($data);
        return $documento;
    }

    public function delete($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();
    }
}
