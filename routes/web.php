<?php

use App\Http\Controllers\DetalleController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NivelconocimientoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TipodocumentoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('niveles', NivelController::class);
    Route::resource('nivelconocimiento', NivelconocimientoController::class);
    Route::resource('tipodocumentos', TipodocumentoController::class);
    Route::resource('documento', DocumentoController::class);
    Route::resource('objetivo', ObjetivoController::class);
    Route::resource('detalle', DetalleController::class);
    Route::resource('footer', FooterController::class);
    Route::resource('pdfs', PdfController::class);
});
