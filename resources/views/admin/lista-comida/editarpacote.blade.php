@extends('anivers.layouts.app')

@section('content')

<div class="header">
    <img src="/css/images_css/logo.png" id="logo">
</div>

<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
</head>
<body>

<div class="tudo">
    <br><h3 align="center">Editar Pacote</h3>
    @if (auth()->id()==3)
        <form action="{{ route('pacotesupdateAdmin.index', $pacote->id) }}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{{ route('pacotesupdateComerc.index', $pacote->id) }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        @method('PUT')
        <div class="form-group">
        <label>Título</label><br>
        <input name="titulo" type="text"  value="{{ $pacote->titulo }}"><br><br>
    
            <div>
                <label for="comidas">Pacote Comida</label>
                <textarea name="comidas" id="comidas" cols="30" rows="10">{{ old('comidas', $pacote->comidas) }}</textarea><br><br>
            </div>
    
            <label>Pacote Bebidas</label>
                <textarea name="bebidas" id="bebidas" cols="30" rows="10">{{ old('bebidas', $pacote->bebidas) }}</textarea><br><br>
    
            <img style="width: 300px; height: 300px;" src="{{asset("storage/". $pacote->imagem1)  }}" alt="Imagem Atual">
            <div class="mb-6">
                <label for="">Editar Imagem 1</label><br>
                    <input type="file" name="imagem1" >
            </div><br><br>
    
            <img style="width: 300px; height: 300px;" src="{{asset("storage/". $pacote->imagem2)  }}" alt="Imagem Atual">
            <div class="mb-6">
                <br><label for="">Editar Imagem 2</label><br>
                    <input type="file" name="imagem2" >
            </div><br><br>
    
            <img style="width: 300px; height: 300px;" src="{{asset("storage/". $pacote->imagem3)  }}" alt="Imagem Atual">
            <div class="mb-6">
                <br><label for="">Editar Imagem 3</label><br>
                    <input type="file" name="imagem3" >
            </div><br><br><br>
    
            <label>Preço em reais</label><br>
            <input name="preco" type="number" value="{{ $pacote->preco }}"  placeholder=""><br><br>
    
            <input type="submit" class="btn btn-primary" value="Atualizar">
    
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
    </form>
        </div>
</div>

@if(auth()->id() == 3)
<a href="{{  route('admindashboard')  }}" id="logout">Dashboard</a> <br><br>
@else 
<a href="{{  route('comercdashboard')  }}" id="logout">Dashboard</a> <br><br>
@endif

</body> 

@endsection
    