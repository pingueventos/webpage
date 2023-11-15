<head>
    @trixassets
</head>
<body>
{{-- <h2>Pacote de Comidas</h2>
<h3>Opcao 1:</h3>
<ul>
    <li>Descricao do pacote de comida</li>
    <li>Descriacao das bebidas</li>
    <li>3 Imagens</li>
    <li>Preco</li>
</ul>

<h3>Opcao 2:</h3>
<ul>
    <li>Descricao do pacote de comida</li>
    <li>Descriacao das bebidas</li>
    <li>3 Imagens</li>
    <li>Preco</li>
</ul> --}}

<form action="{{ route('criarpacotes.store') }}" method="POST" enctype"multipart/form-data">
    @csrf
    <div class="form-group">
    <input name="titulo" type="text" placeholder="Título">

    @trix(\App\Http\Controllers\PacotesController::class, 'comidas')

    @trix(\App\Http\Controllers\PacotesController::class, 'bebidas')

        {{-- <label>Pacote Comida</label>
        <input name="pacotecomidas" type="text">
        <label>Pacote Bebidas</label>
        <input name="pacotebebidas" type="text"> --}}
    
        {{-- <label for="image">Imagem 1</label>
        <input type="file" name="imagem1">

        <label for="image">Imagem 2</label>
        <input type="file" name="imagem2">

        <label for="image">Imagem 3</label>
        <input type="file" name="imagem3"> --}}

        <input type="submit" class="btn btn-primary" value="Register">
</form>
    </div>

<a href="{{  route('admindashboard')  }}">Dashboard</a>

</body>