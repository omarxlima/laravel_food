<?php

use App\Http\Controllers\Admin\{
    PerfilController,
    PlanoController,
    PlanoDetalheController
};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

       /***
     * Route Perfis
    */
    Route::resource('perfis', PerfilController::class);

    /***
    *   Route Detalhes dos Planos
    */
    Route::resource('planos/{url}/detalhes', PlanoDetalheController::class);

    /***
     * Route Planos
    */
    Route::any('/planos/pesquisa', [PlanoController::class, 'pesquisa'])->name('planos.pesquisa');
    Route::resource('planos', PlanoController::class);
    /***
    * Route Dashboard
    */

    Route::get('/', [PlanoController::class, 'dashboard'])->name('admin.dashboard');
});
