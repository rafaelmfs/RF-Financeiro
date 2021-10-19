<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransation extends Model
{
    use HasFactory;
    protected $table = 'financial_transactions';


    public function valueTotal($type, $id){
        $transactions = FinancialTransation::where('type_movement', $type)->where('user', $id)->get();
        $totals = 0;
        foreach($transactions as $transaction){
            $totals += $transaction->value;
        }

        return $totals;

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
