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

    public function valueTotal($transactions){

        $totals = 0;
        foreach($transactions as $transaction){
            $totals += $transaction->value;
        }

        return $totals;

    }

    public function valueTotalCredit($transactions){
        $credit = array();
        foreach($transactions as $i => $transaction){
            if($transaction->type_movement == 1){
                $credit[$i] = $transaction;
            }
        }

        $totals = $this->valueTotal($credit);
        return $totals;
    }

    public function valueTotalDebit($transactions){
        $debit = array();
        foreach($transactions as $i => $transaction){
            if($transaction->type_movement == 2){
                $debit[$i] = $transaction;
            }
        }

        $totals = $this->valueTotal($debit);
        return $totals;
    }

    public function formattedMoves($user){

        $movements = FinancialTransation::where('user', $user->id)->get();

        foreach($movements as $movement){
            $movement->category = Category::find($movement->category)->name;
            $movement->financial_account = FinancialAccount::find($movement->financial_account)->name;
            $movement->type_movement = TypeMovements::find($movement->type_movement)->name;
        }

        return $movements;
    }

    public function formattedMovesFilter($movements){

        foreach($movements as $movement){
            $movement->category = Category::find($movement->category)->name;
            $movement->financial_account = FinancialAccount::find($movement->financial_account)->name;
            $movement->type_movement = TypeMovements::find($movement->type_movement)->name;
        }

        return $movements;
    }

    public function filtterAll($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $transactions;
    }

    public function filtterCategoryAccountType($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->get();
        return $transactions;

    }

    public function filtterAccountTypePeriod($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $transactions;
    }

    public function filtterCategoryAccount($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['financial_account', $request->account],])
            ->get();
        return $transactions;
    }

    public function filtterCategoryPeriod($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $transactions;
    }

    public function filtterCategoryType($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],
            ['type_movement', $request->type],])
            ->get();
        return $transactions;
    }

    public function filtterAccountType($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],
            ['type_movement', $request->type],])
            ->get();
        return $transactions;
    }

    public function filtterTypePeriod($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],])
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $transactions;
    }

    public function filtterCategory($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['category', $request->category],])
            ->get();
        return $transactions;
    }

    public function filtterAccount($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['financial_account', $request->account],])
            ->get();
        return $transactions;
    }

    public function filtterType($user, $request){
        $transactions = FinancialTransation::where([
            ['user', $user->id],
            ['type_movement', $request->type],])
            ->get();
        return $transactions;
    }

    public function filtterPeriod($user, $request){
        $transactions = FinancialTransation::where('user', $user->id)
            ->whereBetween('created_at', ["$request->start%", "$request->end%"])
            ->get();
        return $transactions;
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
