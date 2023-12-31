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
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\paginapublica\InicialController;
use App\Http\Controllers\RecomendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesquisaController;

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

    // Route::get('admin/dashboard/agenda', function(){
    //     return view('admin.agenda-buffet.agenda');
    // }) -> name('agenda');
    Route::get('/admin/dashboard/agenda', [AgendaController::class, 'passaDia'])->name('agendaadmin');

    // Route::resource("/admin/pacotescomida", PacotesController::class);
    Route::post("/admin/pacotescomida", [PacotesController::class, 'pacotesStore'])->name('pacotescomidaAdmin.store');
    Route::get("/admin/pacotescomida", [PacotesController::class, 'pacotesIndex'])->name('pacotescomidaAdmin.index');
    Route::put("/admin/pacotescomida/{pacotescomida}", [PacotesController::class, 'pacotesUpdate'])->name('pacotesupdateAdmin.index');
    Route::delete("/admin/pacotescomida/{pacotescomida}", [PacotesController::class, 'pacotesDestroy'])->name('pacotesAdmin.delete');
    Route::get("/admin/pacotescomida/{pacotescomida}/edit", [PacotesController::class, 'pacotesEdit'])->name('pacoteseditAdmin.index');
    Route::get('admin/pacotesdecomida', function(){
        return view('admin.lista-comida.pacotes-all');
    }) -> name('pacotesAdmin');

    // Route::get('admin/dashboard/pacotesdecomida', function(){
    //     return view('admin.lista-comida.comida');
    // }) -> name('pacotes');

    Route::post('admin/solicitacoesfesta/{id}', [SolicitacaoAdminController::class, 'statusFesta'])->name('statusAdmin');

    Route::get('admin/solicitacoesfesta', [SolicitacaoAdminController::class, 'todasSolicitacoes'])->name('todasSolicitacoesAdm');

    Route::get('admin/dashboard/festasaprovadas', function(){
        return view('admin.lista-solicitacoes.aprovadas');
    }) -> name('aprovada');

    // Route::get('admin/dashboard/pesquisadesatisfacao', function(){
    //     return view('admin.pesquisa');
    // }) -> name('resultadopesquisa');

    Route::get('anivers/pesquisadesatisfacao/{id}', [PesquisaController::class, 'results'])->name('resultadospesquisa');

    // Route::get('admin/dashboard/editar_recomendacoes', function(){
    //     return view('admin.recomendacoes.recomprefesta');
    // }) -> name('editarrecomendacoes');
    Route::get('/admin/recomendacoes', [RecomendationController::class, 'displayRecomendacoes'])->name('listaRecomendacoesAdmin');
    Route::get('/admin/recomendacoes-new', [RecomendationController::class, 'addRecomendacao'])->name('adicionarRecomendacaoAdmin');
    Route::get('/admin/recomendacoes-edit/{id}', [RecomendationController::class, 'editRecomendacao'])->name('editarRecomendacaoAdmin');
    Route::get('/admin/recomendacoes-update/{id}', [RecomendationController::class, 'updateRecomendacao'])->name('atualizarRecomendacaoAdmin');
    Route::get('/admin/recomendacoes-delete/{id}', [RecomendationController::class, 'deleteRecomendacao'])->name('apagarRecomendacaoAdmin');


    Route::post('admin/update-global', [AgendaController::class, 'updateGlobal'])->name('update.globaladmin');
    Route::post('admin/update-especifico', [AgendaController::class, 'updateEspecifico'])->name('update.especificoadmin');
});


Route::middleware(['auth','role:comerc'])->group(function () {
    Route::get('comerc/dashboard', [ComercController::class, 'dashboard']) -> name('comercdashboard');

    Route::get('/comerc/dashboard/agenda', [AgendaController::class, 'passaDia'])->name('agendacomerc');
    Route::resource("/comerc/pacotescomida", PacotesController::class);
    Route::post("/comerc/pacotescomida", [PacotesController::class, 'pacotesStore'])->name('pacotescomidaComerc.store');
    Route::get("/comerc/pacotescomida", [PacotesController::class, 'pacotesIndex'])->name('pacotescomidaComerc.index');
    Route::get("/comerc/pacotescomida/{pacotescomida}/edit", [PacotesController::class, 'pacotesEdit'])->name('pacoteseditComerc.index');
    Route::put("/comerc/pacotescomida/{pacotescomida}", [PacotesController::class, 'pacotesUpdate'])->name('pacotesupdateComerc.index');
    Route::delete("/comerc/pacotescomida/{pacotescomida}", [PacotesController::class, 'pacotesDestroy'])->name('pacotesComerc.delete');

    Route::get('comerc/pacotesdecomida', function(){
        return view('admin.lista-comida.pacotes-all');
    }) -> name('pacotesComerc');

    Route::post('comerc/solicitacoesfesta/{id}', [SolicitacaoAdminController::class, 'statusFesta'])->name('statusComerc');

    Route::get('comerc/solicitacoesfesta', [SolicitacaoAdminController::class, 'todasSolicitacoes'])->name('todasSolicitacoesComerc');

    Route::get('/comerc/recomendacoes', [RecomendationController::class, 'displayRecomendacoes'])->name('listaRecomendacoesComerc');
    Route::get('/comerc/recomendacoes-new', [RecomendationController::class, 'addRecomendacao'])->name('adicionarRecomendacaoComerc');
    Route::get('/comerc/recomendacoes-edit/{id}', [RecomendationController::class, 'editRecomendacao'])->name('editarRecomendacaoComerc');
    Route::get('/comerc/recomendacoes-update/{id}', [RecomendationController::class, 'updateRecomendacao'])->name('atualizarRecomendacaoComerc');
    Route::get('/comerc/recomendacoes-delete/{id}', [RecomendationController::class, 'deleteRecomendacao'])->name('apagarRecomendacaoComerc');

    Route::post('comerc/update-global', [AgendaController::class, 'updateGlobal'])->name('update.globalcomerc');
    Route::post('comerc/update-especifico', [AgendaController::class, 'updateEspecifico'])->name('update.especificocomerc');
});

Route::middleware(['auth','role:operac'])->group(function () {
    Route::get('operac/dashboard', [OperacController::class, 'dashboard']) -> name('operacdashboard');
    Route::get('operac/finalizarfesta/{id}', [SolicitacaoAdminController::class, 'statusFesta'])->name('finalizaFesta');
    Route::get('/convidados-presenca', function(){
        return view('operac.reserva.presenca');
    }) -> name('formulario');

    Route::get('/convidados-presenca', function(){
        return view('operac.reserva.aprovadas');
    }) -> name('festas.operac');
});


Route::middleware(['auth','role:anivers'])->group(function () {
    Route::get('anivers/dashboard', [AniversController::class, 'dashboard']) -> name('aniversdashboard');

    Route::get('anivers/dashboard/solicitar_reserva', function(){
        return view('anivers.solicitacao.solicitacao');
    }) -> name('solicitar_reserva');

    Route::get('anivers/dashboard/inforeserva', function(){
        return view('anivers.reserva-aprovada.inforeserva');
    }) -> name('inforeserva');

    // Route::get('anivers/dashboard/pesquisadesatisfacao', function(){
    //     return view('anivers.reserva-aprovada.reservaconcluida');
    // }) -> name('pesquisadesatisfacao');
    Route::get('anivers/dashboard/pesquisadesatisfacao/{id}/{user_id}', [PesquisaController::class, 'show'])->name('pesquisadesatisfacao');

    Route::get('/formulario', function(){
        return view('anivers.forms.formulario');
    }) -> name('formulario');

    Route::get('/anivers/info-pacotecomida/{id}', [SolicitacaoController::class, 'pacoteShow'])->name('show.pacote');
    Route::get('/anivers/editar-pacotecomida/{id}', [SolicitacaoController::class, 'pacoteEdit'])->name('editar.pacote');
    Route::post('anivers/solicitacoes/{id}', [SolicitacaoController::class, 'cancelar'])->name('cancelar');
    Route::get('anivers/solicitacoes', [SolicitacaoController::class, 'manage'])->name('solicitacoes');

    Route::resource("/anivers/novafesta", SolicitacaoController::class);

    Route::post('anivers/pesquisadesatisfacao', [PesquisaController::class, 'store'])->name('pesquisa.store');

    Route::get('/recomendacoes-Pre-Festa', [RecomendationController::class, 'showRecomendacao'])->name('verRecomendacao');

});
// Route::post("/forms/{festaid}", [ConvidadosController::class, 'display']) -> name('paraforms');
Route::resource("/forms", ConvidadosController::class);
Route::post('/formulario/{id}', [ConvidadosController::class, 'updateStatus'])->name('status.update');
