<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransation extends Model
{
    use HasFactory;
    protected $table = 'financial_transactions';


    // public function valueTotal($type, $id){
    //     $transactions = FinancialTransation::where('type_movement', $type)->where('user', $id)->get();
    //     $totals = 0;
    //     foreach($transactions as $transaction){
    //         $totals += $transaction->value;
    //     }

    //     return $totals;

    // }

    public function valorTotal($movimentacoes){

        $totais = 0;
        foreach($movimentacoes as $movimentacao){
            $totais += $movimentacao->value;
        }

        return $totais;

    }

    public function valorTotalCredito($movimentacoes){
        $credito = array();
        foreach($movimentacoes as $i => $movimentacao){
            if($movimentacao->type_movement == 1){
                $credito[$i] = $movimentacao;
            }
        }

        $totais = $this->valorTotal($credito);
        return $totais;
    }

    public function valorTotalDebito($movimentacoes){
        $debito = array();
        foreach($movimentacoes as $i => $movimentacao){
            if($movimentacao->type_movement == 2){
                $debito[$i] = $movimentacao;
            }
        }

        $totais = $this->valorTotal($debito);
        return $totais;
    }

    public function movimentacoesFormatadas($user){

        $movimentacoes = FinancialTransation::where('user', $user->id)->get();

        foreach($movimentacoes as $movement){
            $movement->category = Category::find($movement->category)->name;
            $movement->financial_account = FinancialAccount::find($movement->financial_account)->name;
            $movement->type_movement = TypeMovements::find($movement->type_movement)->name;
        }

        return $movimentacoes;
    }

    public function filtrarMovimentacoesFormatadas($movementacoes){

        foreach($movementacoes as $movementacao){
            $movementacao->category = Category::find($movementacao->category)->name;
            $movementacao->financial_account = FinancialAccount::find($movementacao->financial_account)->name;
            $movementacao->type_movement = TypeMovements::find($movementacao->type_movement)->name;
        }

        return $movementacoes;
    }

    public function filtrarTodos($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $movimentacoes;
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

    public function filtrarContaTipoPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
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

    public function filtrarCategoriaConta($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],])
            ->get();
        return $transactions;
    }

    public function filtrarCategoriaPeriodo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
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

    public function filtrarTipoConta($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
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

    public function filtrarCategoria($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
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

    public function filtrarTipo($user, $request){
        $movimentacoes = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],])
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
