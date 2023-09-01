<?php

use App\Http\Controllers\Admin\PlanoController;
use Illuminate\Support\Facades\Route;

/*
planos
*/
Route::resource('admin/planos', PlanoController::class);

