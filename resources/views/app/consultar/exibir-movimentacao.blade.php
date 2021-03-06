<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimentação') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2 bg-white rounded-3 p-4 ">
                <h2 class='display-6'>{{$movimentacao->name}}</h2>
                <div class="mt-5 ms-2 row">
                    <div class="col col-md-6">
                        <div class="d-flex">
                            <h4>Conta financeira:</h4>
                            <p class="fs-5 px-2 text-muted">{{$movimentacao->financial_account}}</p>
                        </div>
                        <div class="d-flex">
                            <h4>Categoria:</h4>
                            <p class="fs-5 px-2 text-muted">{{$movimentacao->category}}</p>
                        </div>
                        <div class="d-flex">
                            <h4>Data de vencimento:</h4>
                            @if (!empty($movimentacao->date))
                                @php
                                    $vencimento = strtotime($movimentacao->date);
                                    $vencimento = date('d-m-Y', $vencimento);
                                @endphp
                                <p class="fs-5 px-2 text-muted"> {{str_replace('-', '/', strval($vencimento))}}</p>
                            @else
                                <p class="fs-5 px-2 text-muted"> - </p>
                            @endif
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="d-flex">
                            <h4>Tipo de movimentação:</h4>
                            <p class="fs-5 px-2 text-muted">{{$movimentacao->type_movement}}</p>
                        </div>
                        <div class="d-flex">
                            <h4>Valor:</h4>

                            <p class="fs-5 px-2 text-muted">R$ {{number_format($movimentacao->value, 2, ',', '.')}}</p>
                        </div>
                        <div class="d-flex">
                            <h4>Status:</h4>
                            <p class="fs-5 px-2 text-muted">{{$movimentacao->state}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <h4>Data de criação:</h4>
                        @php
                            $criacao = strtotime($movimentacao->created_at);
                            $criacao = date('d-m-Y * H:i', $criacao);
                            $criacao = str_replace('-', '/', strval($criacao))
                        @endphp
                        <p class="fs-5 px-2 text-muted"> {{str_replace('*', 'às', strval($criacao))}}</p>
                    </div>
                    <div class="d-flex">
                        <h4>Data da ultima atualização: </h4>
                        @php
                            $atualizacao = strtotime($movimentacao->updated_at);
                            $atualizacao = date('d-m-Y * H:i', $atualizacao);
                            $atualizacao = str_replace('-', '/', strval($atualizacao))
                        @endphp
                        <p class="fs-5 px-2 text-muted"> {{str_replace('*', 'às', strval($atualizacao))}}</p>
                    </div>
                    <h4>Descrição: </h4>
                    <div class="rounded-3 border border-light descricao p-2">
                        <p class="fs-5 px-2 text-muted fst-italic">{{$movimentacao->description}}</p>
                    </div>
                    <div class="mt-5 d-flex justify-content-between">
                        <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar</a>
                        <form action="{{ route('editarForm.movimentacao') }}">
                            <input type="hidden" name="id" value="{{$movimentacao->id}}">
                            <button id="btnSave" type="submit" class="btn btn-outline-primary px-5 ms-2">Editar</button>
                        </form>
                    </div>
                </div>

        </div>
    </div>
</x-app-layout>
