<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $documentos = Documento::all();
        return view('home', ['documentos' => $documentos]);
        
    }

    public function crearDocumento() {
        $procesos = Proceso::all();
        $tipos = TipoDocumento::all();
        return view('documentos.crear-documento', compact('procesos', 'tipos'));
        
    }

    public function obtenerProcesos() {
        $procesos = Proceso::all();
        return response()->json($procesos);
    }

    public function obtenerTipos() {
        $tipos = TipoDocumento::all();
        return response()->json($tipos);
    }

    public function obtenerDocumentos(){
        $documentos = Documento::all();
        return response()->json($documentos);
    }

    public function guardarDocumento(Request $request){
        DB::beginTransaction();
        try {
            $documento = new Documento();
            $documento->doc_nombre = $request->doc_nombre;
            $documento->doc_contenido = $request->doc_contenido;
            $documento->doc_id_tipo = $request->doc_id_tipo;
            $documento->doc_id_proceso = $request->doc_id_proceso;
            \Log::info($request->all());
            $documento->save();
            DB::commit();
            return response()->json(['success' => 'Documento guardado correctamente'], 200);
        }catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al guardar el documento: '.$e->getMessage());
            return response()->json(['error' => 'No se guardo el documentoo'], 500);
        }
    }

    public function editarDocumento($id){
        $documento = Documento::find($id);
        $procesos = Proceso::all();
        $tipos = TipoDocumento::all();
        return view('documentos.editar-documento', compact('documento', 'procesos', 'tipos'));
    }

    public function obtenerDocumento($id){
        $documento = Documento::find($id);
        if(!$documento){
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }
        return response()->json($documento);
    }

    public function actualizarDocumento(Request $request, $id){
        try {
            $documento = Documento::findOrFail($id);
            $documento->doc_nombre = $request->doc_nombre;
            $documento->doc_contenido = $request->doc_contenido;
            $documento->doc_id_tipo = $request->doc_id_tipo;
            $documento->doc_id_proceso = $request->doc_id_proceso;
            
            $prefijoProceso = Proceso::find($request->doc_id_proceso)->pro_prefijo;
            $prefijoTipo = TipoDocumento::find($request->doc_id_tipo)->tip_prefijo;
            $consecutivoCompleto = $documento->doc_codigo;
            Log::info($consecutivoCompleto);
            $consecutivoPartes = explode('-', $consecutivoCompleto);
            $numeroConsecutivo = $consecutivoPartes[2];

            $documento->doc_codigo = $prefijoTipo . '-' . $prefijoProceso . '-' . $numeroConsecutivo;

            $documento->save();

            return response()->json(['success' => true, 'message' => 'Documento actualizado correctamente']);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error al actualizar el documento'], 500);
        }
    }

    public function eliminarDocumento($id){
        $documento = Documento::findOrFail($id);
        $documento->delete();
        Log::info('Documento eliminado correctamente');
        return response()->json(null, 204);
    }

}
