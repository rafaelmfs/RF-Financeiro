<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FinancialAccount;
use App\Models\FinancialTransation;
use App\Models\TypeMovements;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinancialTransactionController extends Controller
{
    //
    public function add(){
        $user = Auth::user();
        $categories = Category::where('user', $user->id)->get();
        $type = TypeMovements::all();
        $account = FinancialAccount::where('user', $user->id)->get();

        return view('app.adicionar.adicionar', [
            'categorias' => $categories,
            'tipos' => $type,
            'contas' => $account
        ]);
    }

    public function store(Request $request){
        $transaction = New FinancialTransation();
        try{
            $transaction->name = ucwords(mb_strtolower($request->name, $encoding = mb_internal_encoding()));
            $transaction->type_movement = $request->type;
            $transaction->financial_account = $request->account;
            $transaction->category = $request->category;
            $transaction->value = $request->valueTransaction;
            $transaction->date = $request->dueDate;
            $transaction->description = $request->description;
            $transaction->user = Auth::user()->id;
            $transaction->state = $request->state;

            $transaction->save();

            return redirect()->route('movimentacoes.listar');
        }catch(Exception $err){
            //
        }
    }

    public function consult(){
        $user = Auth::user();
        $categories = Category::where('user', $user->id)->get();
        $account = FinancialAccount::where('user', $user->id)->get();
        // $transaction = FinancialTransation::where('id', $user->id)->get();
        return view('app.consultar.consultarMovimentacoesForm', [
            'categorias' => $categories,
            'contas' => $account
        ]);
    }

    public function consultFilter(Request $request){
        $user = Auth::user();
        $transaction = new FinancialTransation();

        //categoria, conta, tipo e periodo
        if(($request->category) && ($request->account) && ($request->type) && ($request->start) && ($request->end)){
            $movements = $transaction->filtterAll($user, $request);
        }
        //categoria, conta e tipo
        else if(($request->category) && ($request->account) && ($request->type)){
            $movements = $transaction->filtterCategoryAccountType($user, $request);
        }
        //conta, tipo e periodo
        else if(($request->account) && ($request->type) && ($request->start) && ($request->end)){
            $movements = $transaction->filtterAccountTypePeriod($user, $request);
        }
        //categoria e conta//
        else if(($request->category) && ($request->account)){
            $movements = $transaction->filtterCategoryAccount($user, $request);
        }
        //categoria e periodo//
        else if(($request->category) && ($request->start) && ($request->end)){
            $movements = $transaction->filtterCategoryPeriod($user, $request);
        }
        //categoria e tipo//
        else if(($request->category) && ($request->type) ){
            $movements = $transaction->filtterCategoryType($user, $request);
        }
        //conta e tipo
        else if(($request->account) && ($request->type) ){
            $movements = $transaction->filtterAccountType($user, $request);
        }
        //tipo e periodo
        else if(($request->type) && ($request->start) && ($request->end)){
            $movements = $transaction->filtterTypePeriod($user, $request);
        }
        //categoria
        else if(($request->category)){
            $movements = $transaction->filtterCategory($user, $request);
        }
        //conta
        else if(($request->account)){
            $movements = $transaction->filtterAccount($user, $request);

        }
        //tipo
        else if(($request->type)){
            $movements = $transaction->filtterType($user, $request);

        }
        //periodo
        else if(($request->start) && ($request->end)){
            $movements = $transaction->filtterPeriod($user, $request);
        }
        //todos
        else{
            $movements = FinancialTransation::where('user', $user->id)->get();
        }


        $valueCredit = $transaction->valueTotalCredit($movements);
        $valueDebit = $transaction->valueTotalDebit($movements);
        $totals = $valueCredit - $valueDebit;
        $movementsFormated = $transaction->formattedMovesFilter($movements);

        return view('app.consultar.movimentacoes', [
            'credito' => $valueCredit,
            'debito' => $valueDebit,
            'total' => $totals,
            'movimentacoes' => $movementsFormated
        ]);

    }


    public function report(){
        return view('app.relatorios');

    }


}
