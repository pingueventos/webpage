<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convidado;
use App\Models\Solicitacao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ConvidadosController extends Controller
{
    protected $convidado;
    public function __construct(){
        $this->convidado = new Convidado();

    }
    
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

        $convidado = Convidado::create([
            'nome' => $request->nome,
            'CPF' => $request->CPF,
            'idade' => $request->idade,
            'festa_id' => $request->idFesta,
            'user_id' => $request->idUsuario,
            'status' => $request->status,
        ]);

        if(auth()->id()==1)
        {
            $festaId = $convidado->festa_id;
            $solicitacao = Solicitacao::find($festaId);
            $confirmados = $solicitacao->confirmados;
            $confirmados++;
            $solicitacao->update(['confirmados' => $confirmados]);
        }

        return redirect()->back()->with('success','Convidado(a) adicionado)(a) com sucesso!');
    }

    public function updateStatus(string $id)
    {
        $novoStatus = request()->input('novo_status');
        $convidado = Convidado::find($id);
        $convidado->update(['status' => $novoStatus]);

        if ($novoStatus==2)
        {
            $festaId = $convidado->festa_id;
            $solicitacao = Solicitacao::find($festaId);
            $presentes = $solicitacao->presentes;
            $presentes++;
            $solicitacao->update(['presentes' => $presentes]);
        }

        if ($convidado->status == 1) 
        {
            $festaId = $convidado->festa_id;
            $solicitacao = Solicitacao::find($festaId);
            $confirmados = $solicitacao->confirmados;
            $confirmados++;
            $solicitacao->update(['confirmados' => $confirmados]);
        }

        return redirect()->back()->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $convidado = Convidado::find($id);

        if ($convidado->status == 1 || $convidado->status==2)
        {
            $festaId = $convidado->festa_id;
            $solicitacao = Solicitacao::find($festaId);
            $confirmados = $solicitacao->confirmados;
            $confirmados--;
            $solicitacao->update(['confirmados' => $confirmados]);
            if ($convidado->status==2)
            {
                $presentes = $solicitacao->presentes;
                $presentes--;
                $solicitacao->update(['presentes' => $presentes]);
            }
        }
        $convidado->delete();   

        return redirect()->back();
    }
}
