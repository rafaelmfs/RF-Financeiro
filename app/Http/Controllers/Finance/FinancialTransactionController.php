<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FinancialAccount;
use App\Models\TypeMovements;
use Illuminate\Http\Request;

class FinancialTransactionController extends Controller
{
    //
    public function add(){
        $categories = Category::all();
        $type = TypeMovements::all();
        $account = FinancialAccount::all();
        return view('app.adicionar', [
            'categorias' => $categories,
            'tipos' => $type,
            'contas' => $account
        ]);
    }

    public function list(){
        return view('app.consultar');
    }

    public function report(){
        return view('app.relatorios');

    }

}
