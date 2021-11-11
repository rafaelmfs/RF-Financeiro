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
        return view('app.adicionar.adicionarCategoria');
    }

    public function salvar(Request $request){
        $categoria = New Category();
        try{
            if(!empty($request->name)){
                $categoria->user = Auth::user()->id;
                $categoria->name = ucwords(mb_strtolower($request->nome, $encoding = mb_internal_encoding()));
                $categoria->save();
            }

            return redirect()->route('adicionar.categoria');

        }catch(Exception $err){
            return view('app.error');

        }
    }

    public function listar(){
        //
        $user = Auth::user();
        $categoriaFormatada = new Category();
        try{
            $categoria = Category::where('user', $user->id)->get();

            $categorias = $categoriaFormatada->deletavel($categoria);

            return view("app.consultar.categorias", [
                'categorias' => $categorias
            ]);

        }catch(Exception $err){
            return view('app.error');
        }

    }

    public function editar(Category $categoria, Request $request){
        try{
            if(!empty($request->nome)){
                $categoria->name = $request->nome;
            }
            $categoria->save();

            return redirect()->route('categorias.listar');

        }catch(Exception $err){
            return view('app.error');
        }
    }

    public function apagar(Category $categoria){
        try{
            $categoria->delete();
            return redirect()->route('categorias.listar');

        }catch(Exception $err){
            return view('app.error');
        }

    }
}
