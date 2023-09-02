<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoDetalhe extends Model
{
    use HasFactory;

    protected $table = 'plano_detalhes';

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }
}
