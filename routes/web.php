<?php

use App\Http\Controllers\PacotesController;
use App\Http\Controllers\ConvidadosController;
use App\Http\Controllers\BackPanel\AdminController;
use App\Http\Controllers\BackPanel\ComercController;
use App\Http\Controllers\BackPanel\OperacController;
use App\Http\Controllers\BackPanel\AniversController;
use App\Http\Controllers\CancelarReservaAniversController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\SolicitacaoAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']) -> name('admindashboard');
    
    Route::get('admin/dashboard/agenda', function(){
        return view('admin.agenda-buffet.agenda');
    }) -> name('agenda');

    Route::resource("/admin/pacotescomida", PacotesController::class);

    Route::get('admin/pacotesdecomida', function(){
        return view('admin.lista-comida.pacotes-all');
    }) -> name('pacotes');

    // Route::get('admin/dashboard/pacotesdecomida', function(){
    //     return view('admin.lista-comida.comida');
    // }) -> name('pacotes');

    Route::post('admin/solicitacoesfesta/{id}', [SolicitacaoAdminController::class, 'statusAprovado'])->name('statusAprovado');

    Route::get('admin/solicitacoesfesta', [SolicitacaoAdminController::class, 'todasSolicitacoes'])->name('todasSolicitacoes');
    
    Route::get('admin/dashboard/festasaprovadas', function(){
        return view('admin.lista-solicitacoes.aprovadas');
    }) -> name('aprovada');

    Route::get('admin/dashboard/pesquisadesatisfacao', function(){
        return view('admin.pesquisa');
    }) -> name('resultadopesquisa');

    Route::get('admin/dashboard/editar_recomendacoes', function(){
        return view('admin.recomendacoes.recomprefesta');
    }) -> name('editarrecomendacoes');
});


Route::middleware(['auth','role:comerc'])->group(function () {
    Route::get('comerc/dashboard', [ComercController::class, 'dashboard']) -> name('comercdashboard');
});

Route::middleware(['auth','role:operac'])->group(function () {
    Route::get('operac/dashboard', [OperacController::class, 'dashboard']) -> name('operacdashboard');
});


Route::middleware(['auth','role:anivers'])->group(function () {
    Route::get('anivers/dashboard', [AniversController::class, 'dashboard']) -> name('aniversdashboard');
    
    Route::get('anivers/dashboard/solicitar_reserva', function(){
        return view('anivers.solicitacao.solicitacao');
    }) -> name('solicitar_reserva');

    Route::get('anivers/dashboard/inforeserva', function(){
        return view('anivers.reserva-aprovada.inforeserva');
    }) -> name('inforeserva');

    Route::get('anivers/dashboard/pesquisadesatisfacao', function(){
        return view('anivers.reserva-aprovada.reservaconcluida');
    }) -> name('pesquisadesatisfacao');

    Route::post('admin/formulario/{id}', [ConvidadosController::class, 'updateStatus'])->name('status.update');

    Route::get('/formulario', function(){
        return view('anivers.forms.formulario');
    }) -> name('formulario');

    Route::get('/editar-pacotecomida/{id}', [SolicitacaoController::class, 'pacoteEdit'])->name('editar.pacote');
    Route::post('anivers/solicitacoes/{id}', [SolicitacaoController::class, 'cancelar'])->name('cancelar');
    Route::get('anivers/solicitacoes', [SolicitacaoController::class, 'manage'])->name('solicitacoes');

    Route::resource("/anivers/novafesta", SolicitacaoController::class);
});
// Route::post("/forms/{festaid}", [ConvidadosController::class, 'display']) -> name('paraforms');
Route::resource("/forms", ConvidadosController::class);