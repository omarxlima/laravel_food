<?php

use App\Http\Controllers\Admin\{
    PerfilController,
    PermissaoController,
    PlanoController,
    PlanoDetalheController
};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

     /***
     * Route Permissoes
    */
    Route::any('permissoes/pesquisa', [PermissaoController::class, 'pesquisa'])->name('permissoes.pesquisa');
    Route::resource('permissoes', PermissaoController::class);

    /***
     * Route Perfis
    */
    Route::any('perfis/pesquisa', [PerfilController::class, 'pesquisa'])->name('perfis.pesquisa');
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
