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
        $user = Pacotes::create([
            'titulo' => $request->titulo,
            'pacotes-trixFields' => $request->'pacotes-trixFields',
            'bebidas' => $request->bebidas,
            // 'imagem1' => $request->image->store('users'),
            // 'imagem2' => $request->image->store('users'),
            // 'imagem3' => $request->image->store('users'),
        ]);
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $pacote = $this->pacote->find($id);
        $pacote->delete();
        return redirect()->back();
    }
}
