<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function FinancialAccount(){
        return $this->belongsTo('financial_transactions', 'categories', 'id');
    }
}
