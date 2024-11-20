<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    use HasFactory;

    public function personas()
    {
        return $this->belongsTo(personas::class, 'cliente_id');
    }
}