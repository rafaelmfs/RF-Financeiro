<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TypeMovements;
use Exception;
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
        try{
            $category->typeMovement = $request->type;
            $category->user = Auth::user()->id;
            $category->name = ucwords(strtolower($request->name));
            $category->save();

        }catch(Exception $err){

        }

        return redirect()->route('adicionar.categoria');

    }
}
