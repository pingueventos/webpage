<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use Illuminate\Http\RedirectResponse;
use DB;

class ConvidadosController extends Controller
{
    protected $convidado;
    public function __construct(){
        $this->convidado = new Convidado();

    }

    // public function display($festaid)
    // {
    //     $response['convidados'] = $this->convidado->all();
    //     return view('anivers.forms.index')->with($response);
    // }

    public function show($festaid)
    {
        $response['convidados'] = $this->convidado->all();
        $usuarioid = DB::table('solicitacoes')->where('id', $festaid)->value('user_id');
        return view('anivers.forms.index', ['festaId' => $festaid, 'usuarioId' => $usuarioid])->with($response);
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

        Convidado::create([
            'nome' => $request->nome,
            'CPF' => $request->CPF,
            'idade' => $request->idade,
            'festa_id' => $request->idFesta,
            'user_id' => $request->idUsuario,
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
