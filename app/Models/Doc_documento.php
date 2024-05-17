<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pro_proceso;
use App\Models\Tip_tipo_doc;

class Doc_documento extends Model
{
    use HasFactory;
    
    protected $table = 'doc_documento';

    protected $fillable = [
        'doc_nombre',
        'doc_codigo',
        'doc_contenido',
        'doc_id_tipo',
        'doc_id_proceso'
    ];

    //Fucnion para crear el consecutivo que tendra cada documento cuando se guarde
    protected static function boot() {
        static::creating(function ($documento){
            $prefijoProceso = $documento->proceso->pro_prefijo;
            $prefijoTipo = $documento->tipo->tip_prefijo;

            $ultConsecutivo = static::where('doc_id_proceso', $documento->doc_id_proceso)
                ->where('doc_id_tipo',$documento->doc_id_tipo)
                ->orderBy('doc_id','desc')
                ->value('doc_codigo');
            
            $ultConsecutivo = (int) explode('-',$ultConsecutivo)[2] ?? 0;
            $nuevoConsecutivo = $ultConsecutivo + 1;
            $documento->doc_codigo = $prefijoTipo . '-' . $prefijoProceso . '-' . $nuevoConsecutivo;
        });
    }

    public function proceso()
    {
        return $this->belongsTo(Pro_proceso::class, 'doc_id_proceso', 'pro_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tip_tipo_doc::class, 'doc_id_tipo', 'tip_id');
    }
}
