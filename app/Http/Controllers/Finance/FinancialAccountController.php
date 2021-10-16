<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinancialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FinancialAccountController extends Controller
{
    //
    public function add(){
        return view('app.adicionarConta');
    }

    public function store(Request $request){
        $account = new FinancialAccount();
        $account->user = Auth::user()->id;
        $account->name = $request->name;

        $account->save();

        return redirect()->route('adicionar.conta');

    }
}
