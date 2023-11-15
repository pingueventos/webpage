<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use Illuminate\Http\RedirectResponse;

class ConvidadosController extends Controller
{
    protected $convidado;
    public function __construct(){
        $this->convidado = new Convidado();
        
    }

    public function index()
    {
        $response['convidados'] = $this->convidado->all();
        return view('anivers.forms.index')->with($response);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'CPF' => ['required', 'integer', 'unique:'.Convidado::class],
            'idade' => ['required', 'integer'],
        ],[
            'nome.required' => 'Campo obrigatório'

        ]);

        $user = Convidado::create([
            'nome' => $request->nome,
            'CPF' => $request->CPF,
            'idade' => $request->idade,
        ]);
        return redirect()->back()->with('success','Convidado(a) adicionado)(a) com sucesso!');
    }

    public function destroy(string $id)
    {
        $convidado = $this->convidado->find($id);
        $convidado->delete();
        return redirect()->back();
    }
}
