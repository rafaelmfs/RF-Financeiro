<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransation extends Model
{
    use HasFactory;
    protected $table = 'financial_transactions';


    public function FinancialAccount(){
        return $this->belongsTo('financial_accounts', 'id', 'financial-account');
    }

    public function TypeMovement(){
        $this->hasOne('type_movements', 'id', 'type-movement');
    }


}
