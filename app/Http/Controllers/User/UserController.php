<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FinancialAccount;
use App\Models\FinancialTransation;
use App\Models\TypeMovements;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movimentacoes = new FinancialTransation();
        $user = Auth::user();
        $valorCredito = $movimentacoes->valorTotal($movimentacoes->where('user', $user->id)->where('type_movement', 1)->get());
        $valorDebito = $movimentacoes->valorTotal($movimentacoes->where('user', $user->id)->where('type_movement', 2)->get());
        $quantidadeCredito = count($movimentacoes->where('user', $user->id)->where('type_movement', 1)->get());
        $quantidadeDebito = count($movimentacoes->where('user', $user->id)->where('type_movement', 2)->get());
        $ultimasMovimentacoes = $movimentacoes->movimentacoesFormatadas($user);
        $pendentes = FinancialTransation::where([
            ['user', $user->id],
            ['state', "pendente"],])->get();

        return view('app.dashboard', [
            'user' => $user,
            'creditoValor' => $valorCredito,
            'creditoTotal' => $quantidadeCredito,
            'debitoValor' => $valorDebito,
            'debitoTotal' => $quantidadeDebito,
            'total' => ($valorCredito - $valorDebito),
            'movimentacoes' => $ultimasMovimentacoes,
            'pendentes' => count($pendentes)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
