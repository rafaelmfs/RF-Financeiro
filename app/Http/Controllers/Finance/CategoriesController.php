<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TypeMovements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    //
    public function add(){
        $type = TypeMovements::all();
        return view('app.adicionarCategoria', [
            'tipos' => $type
        ]);
    }

    public function store(Request $request){
        $category = New Category();
        $category->typeMovement = $request->type;
        $category->user = Auth::user()->id;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('adicionar.categoria');

    }
}
