<?php

namespace App\Http\Controllers;

use App\Models\Pesquisa;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use DB;

class PesquisaController extends Controller
{

    public function store(Request $request)
    {
        Pesquisa::create([
            'festa_id' => $request->festaId,
            'questao1' => $request->questao_1,
            'questao2' => $request->questao_2,
            'questao3' => $request->questao_3,
            'questao4' => $request->questao_4,
            'pesquisa' => $request->pesquisa,
        ]);

        $solicitacao=Solicitacao::where('id', $request->festaId);
        $solicitacao->update(['status'=> $request->status]);

        return redirect()->back()->with('success','Convidado(a) adicionado)(a) com sucesso!');
    }
    public function show($festaid, $userid)
    {
        // $usuarioid = DB::table('solicitacoes')->where('id', $festaid)->value('user_id');
        return view('anivers.infos.pesquisa-satisfacao', ['festaId' => $festaid, 'usuarioId' => $userid]);
    }

    public function results($festaid)
    {
        $searchId = Pesquisa::where('festa_id', $festaid)->value('id');
        $pesquisa = Pesquisa::find($searchId);
        return view('admin.pesquisas.pesquisa-satisfacao', ['festaId' => $festaid, 'pesquisa' => $pesquisa]);
    }
}
