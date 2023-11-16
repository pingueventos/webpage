@extends('anivers.layouts.app')

@section('content')

<br><h3 align="center">Aniversariante Dashboard</h2>

    <a href="{{  route('aniversdashboard')  }}">Dashboard</a> <br><br>

<a href="{{ route('solicitacoes') }}">Reservas</a><br><br>

<a href="{{ route('novafesta.index') }}">Solicitar festa</a><br>

<br><br><br><br>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>

@endsection