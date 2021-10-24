<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TypeMovements;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function formatTypeName($categories){

        foreach($categories as $category){
            if($category->typeMovement == 1){
                $category->typeMovement= "Crédito";
            }else if($category->typeMovement == 2){
                $category->typeMovement = "Débito";
            }
        }
        return $categories;
    }

    public function typeMovement(){
        return $this->belongsTo(TypeMovements::class, 'id', 'typeMovement');
    }

}
