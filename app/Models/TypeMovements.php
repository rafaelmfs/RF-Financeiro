<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMovements extends Model
{
    use HasFactory;


    public function Category(){
        return $this->hasOne('categories', 'typeMovement', 'id');
    }

    public function FinancialTransaction(){
        return $this->belongsTo('financial_movements', 'financial-movement', 'id');
    }
}
