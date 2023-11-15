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
use App\Http\Controllers\paginapublica\InicialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InicialController::class, 'display'])->name('inicial.display');

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

    Route::get('admin/dashboard/pacotesdecomida', function(){
        return view('admin.lista-comida.comida');
    }) -> name('pacotes');

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

    Route::get('/formulario', function(){
        return view('anivers.forms.formulario');
    }) -> name('formulario');

    // Route::post('anivers/solicitacoes/{id}', [CancelarReservaAniversController::class, 'cancelar'])->name('cancelar');
    Route::post('anivers/solicitacoes/{id}', [SolicitacaoController::class, 'cancelar'])->name('cancelar');
    Route::get('anivers/solicitacoes', [SolicitacaoController::class, 'manage'])->name('solicitacoes');

    Route::resource("/anivers/novafesta", SolicitacaoController::class);
});
Route::resource("/forms", ConvidadosController::class);
