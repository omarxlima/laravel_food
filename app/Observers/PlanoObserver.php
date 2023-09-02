<?php

namespace App\Observers;

use App\Models\Plano;
use Illuminate\Support\Str;


class PlanoObserver
{
    /**
     * Handle the Plano "creating" event.
     */
    public function creating(Plano $plano): void
    {
        $plano->url = Str::slug($plano->nome);
    }

    /**
     * Handle the Plano "updating" event.
     */
    public function updating(Plano $plano): void
    {
        $plano->url = Str::slug($plano->nome);
        
    }

}
