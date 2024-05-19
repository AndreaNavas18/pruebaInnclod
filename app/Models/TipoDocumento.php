<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    
    protected $table = 'tip_tipo_doc';

    protected $primaryKey = 'tip_id';

    protected $fillable = [
        'tip_nombre',
        'tip_prefijo'
    ];
}
