<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h4>{{ __('Dashboard') }}</h4>
        </h2>
    </x-slot>
    <div class="dashboard-container">
        @php
        $nome = explode(" ", Auth::user()->name, 4);
        foreach($nome as $i => $palavra){
            $palavra = ucwords(mb_strtolower($palavra, $encoding = mb_internal_encoding()));
            $nome[$i] = $palavra;
        }
        @endphp

        <!-- 10 cards top -->
        <div class="dash-card total1">
            <div class="info">
                <div class="info-detail">
                    <h3>Receitas</h3>
                    <p>de {{ "$nome[0] $nome[1] "}}</p>
                    <h2>
                        <span>R$</span>
                        {{str_replace('.', ',', $creditoValor)}}
                    </h2>
                </div>
                <div class ="info-imagem">
                    <i class=" mx-2 fas fa-donate"></i>
                </div>
            </div>
        </div>
        <div class="dash-card total2">
            <div class="info">
                <div class="info-detail">
                    <h3>Despesas</h3>
                    <p>de {{ "$nome[0] $nome[1] "}}</p>
                    <h2>
                        <span>R$</span>
                        {{str_replace('.', ',', $debitoValor)}}
                    </h2>
                </div>
                <div class ="info-imagem">
                    <i class="mx-2 fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
        <div class="dash-card total3">
            <div class="info">
                <div class="info-detail">
                    <h3>Total</h3>
                    <p>de {{ "$nome[0] $nome[1] "}}</p>
                    <h2>
                        <span>R$</span>
                        {{str_replace('.', ',', $total)}}
                    </h2>
                </div>
                <div class ="info-imagem">
                    <i class="mx-2 fas fa-balance-scale"></i>
                </div>
            </div>
        </div>

        <div class="dash-card total4">
            <div class="info">
                <div class="info-detail">
                    <h4>Movimentações cadastradas</h4>
                    <div class="totals mt-3">
                        <p>Total despesas: {{ $debitoTotal }}</p>
                        <p>Total receitas: {{ $creditoTotal }}</p>
                    </div>
            </div>
        </div>
    </div>

    @include('app.ultimas-movimentacoes')


</x-app-layout>
