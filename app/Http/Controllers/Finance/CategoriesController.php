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
        return view('app.adicionar.adicionarCategoria', [
            'tipos' => $type
        ]);
    }

    public function store(Request $request){
        $category = New Category();
        try{
            $category->typeMovement = $request->type;
            $category->user = Auth::user()->id;
            $category->name = ucwords(mb_strtolower($request->name, $encoding = mb_internal_encoding()));
            $category->save();

            return redirect()->route('adicionar.categoria');

        }catch(Exception $err){

        }
    }

    public function list(){
        //
        $user = Auth::user();
        $categoriesFormated = new Category();
        $categories = Category::where('user', $user->id)->get();

        return view("app.consultar.categorias", [
            'categorias' => $categoriesFormated->formatTypeName($categories)
        ]);

    }
}
