<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

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
           $solicitacao=DB::table('solicitacoes')->get();
           View::share('solicitacoes', $solicitacao);
           $pacote=DB::table('pacotes')->get();
           View::share('pacotes', $pacote);
           Artisan::call('db:seed', ['--class' => 'CalendarSeeder']);

    }
}
