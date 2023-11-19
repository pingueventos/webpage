@extends('anivers.layouts.app')

@section('content')

<br><h3 align="center">Aniversariante Dashboard</h3>

{{-- <h5>Status das reservas: </h3> --}}

{{-- <a href="{{ route('inforeserva') }} " class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Reservas Aprovadas</a><br><br> --}}

<a href="{{ route('solicitacoes') }}">Reservas</a><br><br>

{{-- <a href="{{ route('pesquisadesatisfacao') }}">Reservas Concluidas</a><br><br> --}}

{{-- <h5>Solicitar nova reserva</h3> --}}
<a href="{{ route('novafesta.index') }}">Solicitar festa</a><br>

<br><br><br><br>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>

@endsection
