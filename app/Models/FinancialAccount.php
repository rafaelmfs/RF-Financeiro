<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    use HasFactory;
    protected $table ='financial_accounts';


    public function User(){
        return $this->belongsTo('users', 'id', 'user');
    }

    public function deletavel($contas){

        foreach($contas as $conta){
            $movimentacao = FinancialTransation::where('financial_account', $conta->id)->first();
            if(empty($movimentacao)){
                $conta->deletavel = true;
            }else{
                $conta->deletavel = false;
            }
        }
        return $contas;
    }

    public function FinancialTransation(){
        return $this->hasMany('financial_transactions', 'financial-account', 'id');
    }
}
