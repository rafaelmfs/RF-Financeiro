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
        $movements = new FinancialTransation();
        $user = Auth::user();
        $valueCredit = $movements->valueTotal($movements->where('user', $user->id)->where('type_movement', 1)->get());
        $valueDebt = $movements->valueTotal($movements->where('user', $user->id)->where('type_movement', 2)->get());
        $amountCredit = count($movements->where('user', $user->id)->where('type_movement', 1)->get());
        $amountDebt = count($movements->where('user', $user->id)->where('type_movement', 2)->get());
        $lastMovements = $movements->formattedMoves($user);

        return view('app.dashboard', [
            'user' => $user,
            'creditoValor' => $valueCredit,
            'creditoTotal' => $amountCredit,
            'debitoValor' => $valueDebt,
            'debitoTotal' => $amountDebt,
            'total' => ($valueCredit - $valueDebt),
            'movimentacoes' => $lastMovements
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
