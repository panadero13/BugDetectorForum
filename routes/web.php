<?php

use App\Http\Controllers\InstanciaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MensajeConstroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
Route::get('/urgentes',[InstanciaController::class,'verUrgentes'])->name('urgentes');
Route::get('/medias',[InstanciaController::class,'verMedias'])->name('medias');
Route::get('/leves',[InstanciaController::class,'verleves'])->name('leves');
Route::get('/mejoras',[InstanciaController::class,'verMejoras'])->name('mejoras');
Route::get('/pendientes',[InstanciaController::class,'verPendientes'])->name('pendientes');
Route::get('/solucionadas',[InstanciaController::class,'verSolucionadas'])->name('solucionadas');
Route::get('/wontfixes',[InstanciaController::class,'verWontfixes'])->name('wontfixes');

Route::middleware(['auth'])->group(function () {

    Route::get('/creaNuevaInstancia', [InstanciaController::class, 'index'])->name('instancia.create');
    Route::post('/guardaInstancia', [InstanciaController::class, 'store'])->name('instancia.store');

    Route::get('/usuarios', [AdminController::class, 'listUsers'])->name('usuario.list');
    Route::get('/changeUserType/{id}', [AdminController::class, 'changeUserType'])->name('usuario.changeType');


    Route::post('/mensaje', [MensajeConstroller::class, 'mensaje'])->name('enviaMensaje');

    Route::get('/verConversacion/{id}',[InstanciaController::class,'verConversacion'])->name('verConversacion');

    Route::get('marcarComoSolucionada/{id}',[InstanciaController::class,'marcarComoSolucionada'])->name('marcarComoSolucionada');
    Route::get('marcarComoPendiente/{id}',[InstanciaController::class,'marcarComoPendiente'])->name('marcarComoPendiente');
    Route::get('marcarComoWontfix/{id}',[InstanciaController::class,'marcarComoWontfix'])->name('marcarComoWontfix');

    Route::post('/postResponseAndClose',[InstanciaController::class,'responderYcerrar'])->name('responderYcerrar');
    Route::post('/postResponse',[InstanciaController::class,'responder'])->name('responder');


});
