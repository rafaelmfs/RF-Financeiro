<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinancialAccount;
use App\Models\FinancialTransation;
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
        $movements = new FinancialTransation();
        $user = Auth::user();
        $credit = $movements->valueTotal(1, $user->id);
        $debt = $movements->valueTotal(2, $user->id);
        $creditTotal = count(FinancialTransation::where('user', $user->id)->where('type_movement', 1)->get());
        $debtTotal = count(FinancialTransation::where('user', $user->id)->where('type_movement', 2)->get());
        return view('app.dashboard', [
            'user' => $user,
            'creditoValor' => $credit,
            'creditoTotal' => $creditTotal,
            'debitoValor' => $debt,
            'debitoTotal' => $debtTotal,
            'total' => ($credit - $debt),
            'movimentacoes' => $movements->where('user', $user->id)->get()
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
