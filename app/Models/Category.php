<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TypeMovements;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function deletavel($categorias){

        foreach($categorias as $categoria){
            $movimentacao = FinancialTransation::where('category', $categoria->id)->first();
            if(empty($movimentacao)){
                $categoria->deletavel = true;
            }else{
                $categoria->deletavel = false;
            }
        }
        return $categorias;
    }

}
