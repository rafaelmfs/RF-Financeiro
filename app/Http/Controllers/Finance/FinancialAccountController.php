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
    public function add(){
        return view('app.adicionarConta');
    }

    public function store(Request $request){
        $account = new FinancialAccount();
        try{
            $account->user = Auth::user()->id;
            $account->name = ucwords(mb_strtolower($request->name, $encoding = mb_internal_encoding()));

            $account->save();

            return view('app.adicionarConta');

        }catch(Exception $err){
            //
        }


    }
}
