<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function TypeMovement(){
        return $this->belongsTo('type_movements', 'id', 'typeMovement');
    }

}
