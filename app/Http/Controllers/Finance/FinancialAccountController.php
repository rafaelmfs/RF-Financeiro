<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinancialAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinancialAccountController extends Controller
{
    //
    public function inserir(){
        return view('app.adicionar.adicionarConta');
    }

    public function salvar(Request $request){
        $conta = new FinancialAccount();
        try{
            $conta->user = Auth::user()->id;
            $conta->name = ucwords(mb_strtolower($request->name, $encoding = mb_internal_encoding()));

            $conta->save();

            return redirect()->route('adicionar.conta');

        }catch(Exception $err){
            //
        }


    }

    public function listar(){
        $user = Auth::user();
        $contaFinanceira = FinancialAccount::where('user', $user->id)->get();
        $contas = new FinancialAccount();
        $contas = $contas->deletavel($contaFinanceira);

        return view('app.consultar.contaFinanceira', [
            'contas' => $contas
        ]);
    }

    public function editar(FinancialAccount $conta, Request $request){
        if(!empty($request->name)){
            $conta->name = $request->name;
            $conta->save();
        }

        return redirect()->route('contas.listar');
    }


    public function apagar(FinancialAccount $conta){
        $conta->delete();

        return redirect()->route('contas.listar');

    }
}
