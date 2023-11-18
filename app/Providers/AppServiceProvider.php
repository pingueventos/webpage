<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
# Descomente as quatro linhas abaixo
    if (!(DB::table('solicitacoes')==null))
    {
       $solicitacao=DB::table('solicitacoes')->get();
       View::share('solicitacoes', $solicitacao);
    }
    if (!(DB::table('pacotes')==null))
    {
        $pacote=DB::table('pacotes')->get();
        View::share('pacotes', $pacote);
    }
    }
}
