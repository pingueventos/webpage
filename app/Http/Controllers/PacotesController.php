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

    public function index()
    {
        $response['pacotes'] = $this->pacote->all();
        return view('admin.lista-comida.comida')->with($response);
    }
    
    public function store(Request $request)
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

    public function edit(string $id)
    {
        $pacote = Pacotes::findOrFail($id);
        return view('admin.lista-comida.editarpacote',compact('pacote'));
    }

    public function update(Request $request, string $id)
    {
        $pacote = Pacotes::findOrFail($id);
        $pacote->update($request->all());
        return redirect()->route('pacotes', ['success' => 'Pacote atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $pacote = $this->pacote->find($id);
        $pacote->delete();
        return redirect()->back();
    }
}
