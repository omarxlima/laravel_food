<?php

use App\Http\Controllers\Admin\PlanoController;
use Illuminate\Support\Facades\Route;

/*
planos
*/
Route::any('admin/planos/pesquisa', [PlanoController::class, 'pesquisa'])->name('planos.pesquisa');
Route::get('admin', [PlanoController::class, 'dashboard'] )->name('admin.dashboard');
Route::resource('admin/planos', PlanoController::class);

