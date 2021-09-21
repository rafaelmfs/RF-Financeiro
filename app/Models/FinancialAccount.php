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

    public function FinancialTransation(){
        return $this->hasMany('financial_transactions', 'financial-account', 'id');
    }
}
