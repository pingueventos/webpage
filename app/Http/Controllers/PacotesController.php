<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Pacotes;
use Illuminate\Support\Facades\File;

class PacotesController extends Controller
{
    protected $pacote;
    public function __construct(){
        $this->pacote = new Pacotes();

    }

    public function pacotesIndex()
    {
        $response['pacotes'] = $this->pacote->all();
        return view('admin.lista-comida.comida')->with($response);
    }

    public function pacotesStore(Request $request)
    {
        Pacotes::create([
            'titulo' => $request->titulo,
            'comidas' => $request->comidas,
            'bebidas' => $request->bebidas,
            'imagem1' => $request->imagem1->store('imagens'),
            'imagem2' => $request->imagem2->store('imagens'),
            'imagem3' => $request->imagem3->store('imagens'),
            'preco' => $request->preco,
        ]);
        return redirect()->back()->with('success','Pacote adicionado com sucesso!');
    }

        public function pacotesEdit(string $id)
    {
        $pacote = Pacotes::findOrFail($id);
        return view('admin.lista-comida.editarpacote',compact('pacote'));
    }

    public function pacotesUpdate(Request $request, string $id)
    {
        $pacote = Pacotes::find($id);
        // $vetIndice = ['titulo','comidas','bebidas','imagem1','imagem2','imagem3','preco'];
        // for ($i=0; $i<7; $i++)
        // {
        //     $indiceAtual = value($vetIndice[$i]);
        //     if($request->$indiceAtual)
        //         $vetUpdate[$vetIndice[$i]] = $request->indiceAtual;
        // }
        // dd($vetUpdate);

            if($request->imagem1)
                $imagem1 = $request->imagem1->store('imagens');
            else
                $imagem1 = $pacote->imagem1;

            if($request->imagem2)
                $imagem2 = $request->imagem2->store('imagens');
            else
                $imagem2 = $pacote->imagem2;

            if($request->imagem3)
                $imagem3 = $request->imagem3->store('imagens');
            else
                $imagem3 = $pacote->imagem3;

        $pacote->update([
            'titulo' => $request->titulo,
            'comidas' => $request->comidas,
            'bebidas' => $request->bebidas,
            'imagem1' => $imagem1,
            'imagem2' => $imagem2,
            'imagem3' => $imagem3,
            'preco' => $request->preco,
        ]);
        if(auth()->id()==3)
            return redirect()->route('pacotesAdmin')->with('success','Pacote adicionado com sucesso!');
        else
            return redirect()->route('pacotesComerc')->with('success','Pacote adicionado com sucesso!');
    }

    public function pacotesDestroy(string $id)
    {
        $pacote = $this->pacote->find($id);
        $pacote->delete();
        return redirect()->back()->with('success','Pacote removido com sucesso!');
    }
}
