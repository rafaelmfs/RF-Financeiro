<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h4>{{ __('Dashboard') }}</h4>
        </h2>
    </x-slot>
    <div class="dashboard-container">
        @php
        if(str_contains(Auth::user()->name, " ")){
            $nome = explode(" ", Auth::user()->name, 4);
            foreach($nome as $i => $palavra){
                $palavra = ucwords(mb_strtolower($palavra, $encoding = mb_internal_encoding()));
                $nome[$i] = $palavra;
            }
        }
        else{
            $nome = Auth::user()->name;
        }
        @endphp

        <!-- 10 cards top -->
        <div class="dash-card total1">
            <div class="info">
                <div class="info-detail">
                    <h3>Receitas</h3>
                    @if (is_iterable($nome))
                        <p>de {{ "$nome[0] $nome[1] "}}</p>
                    @else
                        <p>de {{ "$nome"}}</p>
                    @endif
                    <h2>
                        <span>R$</span>
                        {{number_format($creditoValor, 2, ',', '.')}}
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
                    @if (is_iterable($nome))
                        <p>de {{ "$nome[0] $nome[1] "}}</p>
                    @else
                        <p>de {{ "$nome"}}</p>
                    @endif
                    <h2>
                        <span>R$</span>
                        {{number_format($debitoValor, 2, ',', '.')}}

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
                    @if (is_iterable($nome))
                        <p>de {{ "$nome[0] $nome[1] "}}</p>
                    @else
                        <p>de {{ "$nome"}}</p>
                    @endif
                    <h2>
                        <span>R$</span>
                        {{number_format($total, 2, ',', '.')}}

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
    @if(!empty($pendentes))
        <div class="d-flex alerta bg-warning rounded p-2 text-black-50 fw-bold">
            <i class="fs-5 fas fa-exclamation-triangle me-2"></i>Atenção, você tem {{$pendentes}}  movimentações pendentes.
            <form class="ms-2" method="post"  target="_blank" action="{{ route('movimentacoes.listar') }}">
                @csrf
                <input type="hidden" name="state" value="pendente">

                <button>Clique aqui para visualizá-las.</button>
            </form>
        </div>
    @endif

    @include('app.ultimas-movimentacoes')


</x-app-layout>
