<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $table = 'pro_proceso';

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_nombre',
        'pro_prefijo'
    ];
}
