<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proceso;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Documento extends Model
{
    use HasFactory;
    
    protected $table = 'doc_documento';

    protected $primaryKey = 'doc_id';

    protected $fillable = [
        'doc_nombre',
        'doc_codigo',
        'doc_contenido',
        'doc_id_tipo',
        'doc_id_proceso'
    ];

    //Fucniones para crear el consecutivo que tendra cada documento cuando se guarde
    protected static function boot() {

        parent::boot();
        static::creating(function ($documento){
            $ultConsecutivo = static::orderBy('doc_id', 'desc')->value('doc_codigo');
            $ultNumero = (int) explode('-', $ultConsecutivo)[2];
            $siguiente = $ultNumero + 1;

            $prefijoProceso = $documento->proceso->pro_prefijo;
            $prefijoTipo = $documento->tipo->tip_prefijo;
            $documento->doc_codigo = $prefijoTipo . '-'. $prefijoProceso . '-' . $siguiente;
            
        });
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'doc_id_proceso');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoDocumento::class, 'doc_id_tipo');
    }
}
