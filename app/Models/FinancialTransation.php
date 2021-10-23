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

    public function formattedMoves($user){

        $movements = FinancialTransation::where('user', $user->id)->get();

        foreach($movements as $movement){
            $movement->category = Category::find($movement->category)->name;
            $movement->financial_account = FinancialAccount::find($movement->financial_account)->name;
            $movement->type_movement = TypeMovements::find($movement->type_movement)->name;
        }

        return $movements;

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
