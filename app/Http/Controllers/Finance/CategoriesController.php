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
    public function inserir(){
        $tipo = TypeMovements::all();
        return view('app.adicionar.adicionarCategoria', [
            'tipos' => $tipo
        ]);
    }

    public function salvar(Request $request){
        $categoria = New Category();
        try{
            $categoria->typeMovement = $request->tipo;
            $categoria->user = Auth::user()->id;
            $categoria->name = ucwords(mb_strtolower($request->nome, $encoding = mb_internal_encoding()));
            $categoria->save();

            return redirect()->route('adicionar.categoria');

        }catch(Exception $err){
            dd($err);
        }
    }

    public function listar(){
        //
        $user = Auth::user();
        $categoriaFormatada = new Category();
        $categoria = Category::where('user', $user->id)->get();
        $tipo = TypeMovements::all();

        $categorias = $categoriaFormatada->deletavel($categoria);

        return view("app.consultar.categorias", [
            'categorias' => $categoriaFormatada->formatarNomeTipo($categorias),
            'tipos' => $tipo
        ]);

    }

    public function editar(Category $categoria, Request $request){
            if(!empty($request->nome)){
                $categoria->name = $request->nome;
            }
            if(!empty($request->tipo)){
                $categoria->typeMovement = $request->tipo;
            }
            $categoria->save();

        return redirect()->route('categorias.listar');
    }

    public function apagar(Category $categoria){
        $categoria->delete();

        return redirect()->route('categorias.listar');

    }
}
