<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recomendation;
use DB;

class RecomendationController extends Controller
{
    public function displayRecomendacoes()
    {
        $recomendacoes = Recomendation::all();
        return view('admin/recomendacoes/recomprefesta', ['recomendacoes' => $recomendacoes]);
    }

    public function addRecomendacao(Request $request)
    {
        Recomendation::create([
            'recomendacao' => $request->novaRecomendacao,
        ]);
        return redirect()->back()->with('success', 'Recomendação criada com sucesso.');
    }

    public function editRecomendacao($id)
    {
        $recomendacao = DB::table('recomendations')->find($id);
        return view('admin.recomendacoes.editar-recomendacao', ['recomendacao' => $recomendacao]);
    }

    public function updateRecomendacao(Request $request, $id)
    {
        $recomendacao = Recomendation::find($id);
        $recomendacao->update([
            'recomendacao' => $request->updatedRecomendation,
        ]);
        return redirect()->back()->with('success','Recomendação atualizada com sucesso.');
    }

    public function deleteRecomendacao($id)
    {
        $recomendacao = Recomendation::find($id);
        $recomendacao->delete();
        return redirect()->back()->with('success', 'Recomendação removida com sucesso.');
    }

    public function showRecomendacao ()
    {
        $recomendacoes = Recomendation::all();

        return view('anivers.infos.pre-festa', ['recomendacoes' => $recomendacoes]);

    }
}
