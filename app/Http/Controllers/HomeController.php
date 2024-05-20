<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\DocumentoService;

class HomeController extends Controller
{
    protected $documentoService;

    public function __construct(DocumentoService $documentoService) {
        $this->middleware('auth');
        $this->documentoService = $documentoService;
    }

    public function index(){
        $documentos = $this->documentoService->getAllDocumentos();
        return view('home', ['documentos' => $documentos]);
    }

    public function crearDocumento(){
        $procesos = $this->documentoService->getAllProcesos();
        $tipos = $this->documentoService->getAllTipos();
        return view('documentos.crear-documento', compact('procesos', 'tipos'));
    }

    public function obtenerProcesos()
    {
        $procesos = $this->documentoService->getAllProcesos();
        return response()->json($procesos);
    }

    public function obtenerTipos() {
        $tipos = $this->documentoService->getAllTipos();
        return response()->json($tipos);
    }

    public function obtenerDocumentos(){
        $documentos = $this->documentoService->getAllDocumentos();
        return response()->json($documentos);
    }

    public function guardarDocumento(Request $request){
        $this->validate($request, [
            'doc_nombre' => 'required|string|max:255',
            'doc_contenido' => 'required|string',
            'doc_id_tipo' => 'required|integer',
            'doc_id_proceso' => 'required|integer',
        ]);

        $data = $request->only(['doc_nombre', 'doc_contenido', 'doc_id_tipo', 'doc_id_proceso']);
        $documento = $this->documentoService->createDocumento($data);

        return response()->json(['success' => 'Documento guardado correctamente'], 200);
    }

    public function editarDocumento($id){
        $documento = $this->documentoService->getAllDocumentos()->find($id);
        $procesos = $this->documentoService->getAllProcesos();
        $tipos = $this->documentoService->getAllTipos();
        return view('documentos.editar-documento', compact('documento', 'procesos', 'tipos'));
    }

    public function obtenerDocumento($id){
        $documento = $this->documentoService->getAllDocumentos()->find($id);
        if (!$documento) {
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }
        return response()->json($documento);
    }

    public function actualizarDocumento(Request $request, $id){
        $this->validate($request, [
            'doc_nombre' => 'required|string|max:255',
            'doc_contenido' => 'required|string',
            'doc_id_tipo' => 'required|integer',
            'doc_id_proceso' => 'required|integer',
        ]);

        $data = $request->only(['doc_nombre', 'doc_contenido', 'doc_id_tipo', 'doc_id_proceso']);
        $documento = $this->documentoService->updateDocumento($id, $data);

        return response()->json(['success' => true, 'message' => 'Documento actualizado correctamente']);
    }

    public function eliminarDocumento($id){
        $this->documentoService->deleteDocumento($id);
        return response()->json(null, 204);
    }

}
