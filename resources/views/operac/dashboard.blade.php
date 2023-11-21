<link rel="stylesheet" href="/css/pagi_operac.css?v=2">

<h2>Área Operacional</h2>

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="Vizu_festa">
    <button id="botao">
        <a href="{{  route('festas.operac') }}" id="texto">Visualizar Festas
        <br><br>
        <img src="/css/images_css/lupa.png"/>
        </a>
    </button>
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault();
                                             this.closest('form').submit();" >
    Logout</a>

</form>