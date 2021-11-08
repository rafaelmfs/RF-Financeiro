<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransation extends Model
{
    use HasFactory;
    protected $table = 'financial_transactions';

    public function valorTotal($movimentacoes){

        $totais = 0;
        foreach($movimentacoes as $movimentacao){
            if($movimentacao->state == 'confirmado'){
                $totais += $movimentacao->value;
            }
        }

        return $totais;

    }

    public function valorTotalCredito($movimentacoes){
        $credito = array();
        foreach($movimentacoes as $i => $movimentacao){
            if($movimentacao->type_movement == 1 && $movimentacao->state == 'confirmado'){
                $credito[$i] = $movimentacao;
            }
        }

        $totais = $this->valorTotal($credito);
        return $totais;
    }

    public function valorTotalDebito($movimentacoes){
        $debito = array();
        foreach($movimentacoes as $i => $movimentacao){
            if($movimentacao->type_movement == 2  && $movimentacao->state == 'confirmado'){
                $debito[$i] = $movimentacao;
            }
        }

        $totais = $this->valorTotal($debito);
        return $totais;
    }

    public function movimentacoesFormatadas($user){

        $movimentacoes = FinancialTransation::where('user', $user->id)->get();

        foreach($movimentacoes as $movimentacao){
            $movimentacao->category = Category::find($movimentacao->category)->name;
            $movimentacao->financial_account = FinancialAccount::find($movimentacao->financial_account)->name;
            $movimentacao->type_movement = TypeMovements::find($movimentacao->type_movement)->name;
        }

        return $movimentacoes;
    }

    public function filtrarMovimentacoesFormatadas($movimentacoes){
        if(is_iterable($movimentacoes)){
            foreach($movimentacoes as $movimentacao){
                $movimentacao->category = Category::find($movimentacao->category)->name;
                $movimentacao->financial_account = FinancialAccount::find($movimentacao->financial_account)->name;
                $movimentacao->type_movement = TypeMovements::find($movimentacao->type_movement)->name;


            }

        }else{
            $movimentacoes->category = Category::find($movimentacoes->category)->name;
            $movimentacoes->financial_account = FinancialAccount::find($movimentacoes->financial_account)->name;
            $movimentacoes->type_movement = TypeMovements::find($movimentacoes->type_movement)->name;

        }

        return $movimentacoes;
    }

    public function filtrarTodos($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarSemStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }



    public function filtrarCategoriaContaTipoStatus($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->get();
        return $transactions;

    }

    public function filtrarCategoriaContaTipo($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->get();
        return $transactions;

    }

    public function filtrarContaTipoPeriodoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarContaTipoPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaTipoPeriodoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaTipoPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaContaStatus($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['state', $request->state],])
            ->get();
        return $transactions;
    }

    public function filtrarCategoriaConta($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],])
            ->get();
        return $transactions;
    }

    public function filtrarCategoriaPeriodoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['state', $request->state],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaTipoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaTipo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['type_movement', $request->type],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipoContaStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],
            ['state', $request->state], ])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipoConta($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipoPeriodoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],
            ['state', $request->state],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipoPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoriaStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['state', $request->state], ])
            ->get();
        return $movimentacoes;
    }

    public function filtrarCategoria($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarContaStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['state', $request->state], ])
            ->get();
        return $movimentacoes;
    }
    public function filtrarConta($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipoStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],
            ['state', $request->state], ])
            ->get();
        return $movimentacoes;
    }

    public function filtrarTipo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarStatus($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['state', $request->state],])
            ->get();
        return $movimentacoes;
    }

    public function filtrarPeriodoStatus($user, $request){
        $movimentacoes = FinancialTransation::where('user', $user->id)
            ->where('state', $request->state)
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }


    public function filtrarPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where('user', $user->id)
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
    }


    public function financialAccount(){
        return $this->belongsTo('FinancialAccount', 'id', 'financial-account');
    }

    public function typeMovement(){
        $this->hasOne('type_movements', 'id', 'type_movement');
    }


    public function user(){
        return $this->belongsTo('users', 'id', 'user');
    }

}
