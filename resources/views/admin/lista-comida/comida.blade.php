@extends('anivers.layouts.app')

@section('content')

<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
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
<br><h3 align="center">Novo Pacote</h3>
@if (auth()->id()==3)
    <form action="{{ route('pacotescomidaAdmin.store') }}" method="POST" enctype="multipart/form-data">
@else
    <form action="{{ route('pacotescomidaComerc.store') }}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <div class="form-group">
    <label>Título</label><br>
    <input name="titulo" type="text" placeholder=""><br><br>

        <div>
            <label for="comidas">Pacote Comida</label>
            <textarea name="comidas" id="comidas" cols="30" rows="10"></textarea><br><br>
        </div>

        <label>Pacote Bebidas</label>
            <textarea name="bebidas" id="bebidas" cols="30" rows="10"></textarea><br><br>

        <div class="mb-6">
            <label for="">Imagem 1</label><br>
                <input type="file" name="imagem1" >
        </div>

        <div class="mb-6">
            <br><label for="">Imagem 2</label><br>
                <input type="file" name="imagem2" >
        </div>

        <div class="mb-6">
            <br><label for="">Imagem 3</label><br>
                <input type="file" name="imagem3" >
        </div>

        <label>Preço em reais</label><br>
        <input name="preco" type="number" placeholder=""><br><br>

        <input type="submit" class="btn btn-primary" value="Adicionar">

        <script>
            ClassicEditor
                .create( document.querySelector( '#comidas' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#bebidas' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
     
        {{-- <label for="image">Imagem 1</label>
        <input type="file" name="imagem1">

        <label for="image">Imagem 2</label>
        <input type="file" name="imagem2">

        <label for="image">Imagem 3</label>
        <input type="file" name="imagem3"> --}}
</form>
    </div>

@if(auth()->id() == 3)
<a href="{{  route('admindashboard')  }}">Dashboard</a> <br><br>
@else 
<a href="{{  route('comercdashboard')  }}">Dashboard</a> <br><br>
@endif

</body> 

@endsection
    