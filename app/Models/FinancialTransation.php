<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransation extends Model
{
    use HasFactory;
    protected $table = 'financial_transactions';


    public function FinancialAccount(){
        return $this->belongsTo('FinancialAccount', 'id', 'financial-account');
    }

    public function TypeMovement(){
        $this->hasOne('type_movements', 'id', 'type-movement');
    }


    public function User(){
        return $this->belongsTo('users', 'id', 'user');
    }



}
