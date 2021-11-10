<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FinancialAccount;
use App\Models\FinancialTransation;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //
    public function relatorios(){
        return view('app.relatorio.relatorios');
    }

    public function categorias(){
        $user = Auth::user();
        $categorias = Category::where('user', $user->id)->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('app.relatorio.categorias', [
            'usuario' => $user,
            'categorias' => $categorias])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->setPaper('a4')->stream('relatorio.pdf');

    }

    public function contas(){
        $user = Auth::user();
        $conta = FinancialAccount::where('user', $user->id)->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('app.relatorio.conta', [
            'usuario' => $user,
            'contas' => $conta])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->setPaper('a4')->stream('relatorio.pdf');

    }

    public function movimentacoes(Request $request){
        $user = Auth::user();
        $movimentacao = new FinancialTransation();

        if(!empty($request->start) && !empty($request->end)){
            $movimentacoes = $movimentacao->filtrarPeriodo($user, $request);
        }else{
            $movimentacoes = FinancialTransation::where('user', $user->id)->get();
        }


        $valorCredito = $movimentacao->valorTotalCredito($movimentacoes);
        $valorDebito = $movimentacao->valorTotalDebito($movimentacoes);
        $totais = $valorCredito - $valorDebito;
        $movimentacaoFormatada = $movimentacao->filtrarMovimentacoesFormatadas($movimentacoes);
        $pendentes = 0;
        $confirmadas = 0;

        foreach($movimentacaoFormatada as $mov){
            if($mov->state == 'confirmado'){
                $confirmadas++;
            }
            else if($mov->state == 'pendente'){
                $pendentes++;
            }
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('app.relatorio.movimentacoes', [
            'usuario' => $user,
            'movimentacoes' => $movimentacaoFormatada,
            'credito' => $valorCredito,
            'debito' => $valorDebito,
            'total' => $totais,
            'pendentes' => $pendentes,
            'confirmadas' => $confirmadas
        ])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->setPaper('a4')->stream('relatorio.pdf');


        // return view('app.relatorio.movimentacoes', [
        //     'usuario' => $user,
        //     'movimentacoes' => $movimentacaoFormatada,
        //     'credito' => $valorCredito,
        //     'debito' => $valorDebito,
        //     'total' => $totais,
        //     'pendentes' => $pendentes,
        //     'confirmadas' => $confirmadas
        // ]);
    }
}
