<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chave;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function relatoriosPage() {

        // $pedidosQuery = Pedido::where('user_id', Auth::id());

//        dd($pedidosQuey);
        // $chaves = $pedidosQuery
        //     ->select(['chave_id'])
        //     ->groupBy('chave_id')
        //     ->get()
        //     ->toArray();
//            ->toArray();

        // $chaves = collect($chaves)
        //     ->map(function ($chave) {
        //         return Chave::with('sala')
        //             ->find($chave['chave_id']);
        //     });

        $chaves = Chave::all();
//        dd(($chaves));

        return view('admin.relatorio.relatorio', ['chaves' => $chaves]);
    }

    public function gerarRelatorioPedidos(Request $request) {


        $dataInicioEmprestimo = $request->input('data-inicio-emprestimo');
        $dataFimEmprestimo = $request->input('data-fim-emprestimo');
        $dataInicioDevolucao = $request->input('data-inicio-devolucao');
        $dataFimDevolucao = $request->input('data-fim-devolucao');
        $categoria = $request->input('categoria');
        $siape = $request->input('user_siape');


        $chave = $request->input('chave');
//        dd($dataInicioDevolucao);

        // $user = Auth::user();

        $pedidosQuery = Pedido::where('id', '>', 0);
        $mensagem = "";

        if (isset($dataInicioEmprestimo)) {
            $mensagem = "Relatório de todas as reservas feitas por desde " . Carbon::parse($dataInicioEmprestimo)->format('d/m/Y');
            $pedidosQuery = $pedidosQuery
                ->where('created_at', '>=', $dataInicioEmprestimo);
        }

        if (isset($dataFimEmprestimo)) {

            if ($mensagem != "") {
                $mensagem = $mensagem . ' até ' . Carbon::parse($dataFimEmprestimo)->format('d/m/Y');
            } else {
                $mensagem = "Relatório de todas as reservas feitas até " . Carbon::parse($dataFimEmprestimo)->format('d/m/Y');
            }
            $pedidosQuery = $pedidosQuery
                ->where('created_at', '<=', Carbon::parse($dataFimEmprestimo)->addDay());
        }

        if (isset($dataInicioDevolucao)) {
            $pedidosQuery = $pedidosQuery
                ->where('devolvido_em', '>=', $dataInicioDevolucao);
        }

        if (isset($dataFimDevolucao)) {
            $pedidosQuery = $pedidosQuery
                ->where('devolvido_em', '<=', Carbon::parse($dataFimDevolucao)->addDay());
        }

        if (isset($categoria)) {
            $pedidosQuery = $pedidosQuery
                ->whereRelation('chave.sala', 'categoria', $categoria);
        }

        if (isset($siape)) {
            $pedidosQuery = $pedidosQuery
                ->whereRelation('user', 'siape',$siape);
        }

        if (isset($chave) && $chave != '') {
            $pedidosQuery = $pedidosQuery
                ->where('chave_id', $chave);
        }


        if ($mensagem == '') {
            $mensagem = "Relatório de todas as reservas feitas";
        }

        $pedidos = $pedidosQuery
            ->with('chave.sala')
            ->with('user')
            ->get()
            ->toArray();


//        return view('tecnico.relatorio.reserva', ['pedidos' => $pedidos]);
        view()->share('pedidos', $pedidos);
        view()->share('mensagem', $mensagem);

        $pdf = Pdf::loadview('tecnico.relatorio.reserva', $pedidos);

        return $pdf->download('relatorio.pdf');
}
}
