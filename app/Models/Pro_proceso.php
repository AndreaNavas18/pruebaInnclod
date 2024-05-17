<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pro_proceso extends Model
{
    use HasFactory;

    protected $table = 'pro_proceso';

    protected $fillable = [
        'pro_nombre',
        'pro_prefijo'
    ];
}
