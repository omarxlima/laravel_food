<?php

use App\Http\Controllers\Admin\PlanoController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {

    /***
    *   Route Detalhes dos Planos
    */
    Route::resource('planos/{ur}', PlanoController::class);

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
