<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FinancialAccount;
use App\Models\FinancialTransation;
use App\Models\TypeMovements;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinancialTransactionController extends Controller
{
    //
    public function inserir(){
        $user = Auth::user();
        $categorias = Category::where('user', $user->id)->get();
        $tipos = TypeMovements::all();
        $conta = FinancialAccount::where('user', $user->id)->get();

        return view('app.adicionar.adicionar', [
            'categorias' => $categorias,
            'tipos' => $tipos,
            'contas' => $conta
        ]);
    }

    public function salvar(Request $request){
        $movimentacao = New FinancialTransation();
        try{
            $movimentacao->name = ucwords(mb_strtolower($request->nome, $encoding = mb_internal_encoding()));
            $movimentacao->type_movement = $request->tipo;
            $movimentacao->financial_account = $request->conta;
            $movimentacao->category = $request->categoria;
            $movimentacao->value = $request->valorMovimentacao;
            $movimentacao->date = $request->dataVencimento;
            $movimentacao->description = $request->descricao;
            $movimentacao->user = Auth::user()->id;
            $movimentacao->state = $request->status;

            $movimentacao->save();

            return  $this->exibir($movimentacao->id);
        }catch(Exception $err){
            //
            return view('app.error');
        }
    }

    public function consultar(){
        $user = Auth::user();
        $categorias = Category::where('user', $user->id)->get();
        $contas = FinancialAccount::where('user', $user->id)->get();
        // $transaction = FinancialTransation::where('id', $user->id)->get();
        return view('app.consultar.consultarMovimentacoesForm', [
            'categorias' => $categorias,
            'contas' => $contas
        ]);
    }

    public function consultarFiltro(Request $request){
        $user = Auth::user();
        $movimentacao = new FinancialTransation();
        try{

            //categoria, conta, tipo, periodo e status
            if(($request->category) && ($request->account) && ($request->type) && ($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarTodos($user, $request);
            }
            //categoria, conta, tipo e periodo
            else if(($request->category) && ($request->account) && ($request->type) && ($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarSemStatus($user, $request);
            }
            //categoria, conta, tipo e status
            else if(($request->category) && ($request->account) && ($request->type) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaContaTipoStatus($user, $request);
            }
            //categoria, conta e tipo
            else if(($request->category) && ($request->account) && ($request->type)){
                $movimentacoes = $movimentacao->filtrarCategoriaContaTipo($user, $request);
            }
            //conta, tipo, periodo e status
            else if(($request->account) && ($request->type) && ($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarContaTipoPeriodoStatus($user, $request);
            }
            //conta, tipo e periodo
            else if(($request->account) && ($request->type) && ($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarContaTipoPeriodo($user, $request);
            }
            //categoria, tipo, periodo e status
            else if(($request->category) && ($request->type) && ($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaTipoPeriodoStatus($user, $request);
            }
            //categoria, tipo e periodo
            else if(($request->category) && ($request->type) && ($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarCategoriaTipoPeriodo($user, $request);
            }
            //categoria, conta e status//
            else if(($request->category) && ($request->account) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaContaStatus($user, $request);
            }
            //categoria e conta//
            else if(($request->category) && ($request->account)){
                $movimentacoes = $movimentacao->filtrarCategoriaConta($user, $request);
            }
            //categoria, periodo e status//
            else if(($request->category) && ($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaPeriodoStatus($user, $request);
            }
            //categoria e periodo//
            else if(($request->category) && ($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarCategoriaPeriodo($user, $request);
            }
            //categoria, tipo e status//
            else if(($request->category) && ($request->type) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaTipoStatus($user, $request);
            }
            //categoria e tipo//
            else if(($request->category) && ($request->type) ){
                $movimentacoes = $movimentacao->filtrarCategoriaTipo($user, $request);
            }
            //conta, tipo e status
            else if(($request->account) && ($request->type) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarTipoContaStatus($user, $request);
            }
            //conta e tipo
            else if(($request->account) && ($request->type) ){
                $movimentacoes = $movimentacao->filtrarTipoConta($user, $request);
            }
            //tipo, periodo e status
            else if(($request->type) && ($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarTipoPeriodoStatus($user, $request);
            }
            //tipo e periodo
            else if(($request->type) && ($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarTipoPeriodo($user, $request);
            }
            //categoria e status
            else if(($request->category) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarCategoriaStatus($user, $request);
            }
            //categoria
            else if(($request->category)){
                $movimentacoes = $movimentacao->filtrarCategoria($user, $request);
            }
            //conta e status
            else if(($request->account) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarContaStatus($user, $request);
            }
            //conta
            else if(($request->account)){
                $movimentacoes = $movimentacao->filtrarConta($user, $request);
            }
            //tipo e status
            else if(($request->type) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarTipoStatus($user, $request);
            }
            //tipo
            else if(($request->type)){
                $movimentacoes = $movimentacao->filtrarTipo($user, $request);
            }
            //periodo e status
            else if(($request->start) && ($request->end) && ($request->state)){
                $movimentacoes = $movimentacao->filtrarPeriodoStatus($user, $request);
            }
            //periodo
            else if(($request->start) && ($request->end)){
                $movimentacoes = $movimentacao->filtrarPeriodo($user, $request);
            }
            //status
            else if(($request->state)){
                $movimentacoes = $movimentacao->filtrarStatus($user, $request);
            }
            //todos
            else{
                $movimentacoes = FinancialTransation::where('user', $user->id)->get();
            }

            // dd($movimentacao);
            $valorCredito = $movimentacao->valorTotalCredito($movimentacoes);
            $valorDebito = $movimentacao->valorTotalDebito($movimentacoes);
            $totais = $valorCredito - $valorDebito;
            $movimentacaoFormatada = $movimentacao->filtrarMovimentacoesFormatadas($movimentacoes);

            return view('app.consultar.movimentacoes', [
                'credito' => $valorCredito,
                'debito' => $valorDebito,
                'total' => $totais,
                'movimentacoes' => $movimentacaoFormatada
            ]);
        }catch(Exception $err){
            return view('app.error');
        }


    }

    public function formEditar(Request $request){

        $movimentacao = FinancialTransation::find($request->id);
        $tipo = TypeMovements::where('id', '<>', $movimentacao->type_movement)->get();
        $categoria = Category::where('id', '<>', $movimentacao->category)->get();
        $conta = FinancialAccount::where('id', '<>', $movimentacao->financial_account)->get();
        $movimentacao = $movimentacao->filtrarMovimentacoesFormatadas($movimentacao);
        return view('app.consultar.form-editar-movimentacoes', [
            'movimentacao' =>$movimentacao,
            'tipos' => $tipo,
            'categorias' => $categoria,
            'contas' => $conta
         ]);
    }

    public function editar(FinancialTransation $movimentacao, Request $request){
        //
        try{
            if(!empty($request->nome)){
                $movimentacao->name = $request->nome;
            }
            if(!empty($request->tipo)){
                $movimentacao->type_movement = $request->tipo;
            }
            if(!empty($request->conta)){
                $movimentacao->financial_account = $request->conta;
            }
            if(!empty($request->categoria)){
                $movimentacao->category = $request->categoria;
            }
            if(!empty($request->status)){
                $movimentacao->state = $request->status;
            }
            $movimentacao->value = $request->valorMovimentacao;
            $movimentacao->date = $request->dataVencimento;
            $movimentacao->description = $request->descricao;
            $movimentacao->save();

            return  $this->exibir($movimentacao->id);

        }catch(Exception $err){
            return view('app.error');
        }

    }

    public function apagar(FinancialTransation $movimentacao){
        try{
            $movimentacao->delete();
            return redirect()->route('movimentacoes.listar');
        }catch(Exception $err){
            return view('app.error');
        }
    }

    public function exibir($id){
        try{
            $movimentacao = FinancialTransation::find($id);
            $movimentacao = $movimentacao->filtrarMovimentacoesFormatadas($movimentacao);

            return view('app.consultar.exibir-movimentacao', [
                'movimentacao' => $movimentacao
            ]);

        }catch(Exception $err){
            return view('app.error');
        }
    }


    public function report(){
        return view('app.relatorios');
    }


}
