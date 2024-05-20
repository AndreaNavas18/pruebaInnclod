<?php

namespace App\Services;

use App\Repositories\DocumentoRepoInterfaz;
use App\Repositories\ProcesoRepository;
use App\Repositories\TipoDocumentoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocumentoService
{
    protected $documentoRepository;
    protected $procesoRepository;
    protected $tipoDocumentoRepository;

    public function __construct(
        DocumentoRepoInterfaz $documentoRepository,
        ProcesoRepository $procesoRepository,
        TipoDocumentoRepository $tipoDocumentoRepository
    ) {
        $this->documentoRepository = $documentoRepository;
        $this->procesoRepository = $procesoRepository;
        $this->tipoDocumentoRepository = $tipoDocumentoRepository;
    }

    public function getAllDocumentos()
    {
        return $this->documentoRepository->getAll();
    }

    public function getAllProcesos()
    {
        return $this->procesoRepository->getAll();
    }

    public function getAllTipos()
    {
        return $this->tipoDocumentoRepository->getAll();
    }

    public function createDocumento(array $data)
    {
        DB::beginTransaction();
        try {
            $documento = $this->documentoRepository->create($data);
            DB::commit();
            return $documento;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar el documentp: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateDocumento($id, array $data)
    {
        try {
            $documento = $this->documentoRepository->findById($id);
            $prefijoProceso = $this->procesoRepository->findById($data['doc_id_proceso'])->pro_prefijo;
            $prefijoTipo = $this->tipoDocumentoRepository->findById($data['doc_id_tipo'])->tip_prefijo;
            $consecutivoCompleto = $documento->doc_codigo;
            $consecutivoPartes = explode('-', $consecutivoCompleto);
            $numeroConsecutivo = $consecutivoPartes[2];
            $data['doc_codigo'] = $prefijoTipo . '-' . $prefijoProceso . '-' . $numeroConsecutivo;
            return $this->documentoRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function deleteDocumento($id)
    {
        return $this->documentoRepository->delete($id);
    }
}
