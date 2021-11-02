<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimentações') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2 class="display-5">Resultado</h2>
            <div class="border bg-light rounded-3 p-5 detail">
                <div id="table">
                    <table class="table">
                        <tr>
                            <th class="table-head">Nome</th>
                            <th class="table-head">Tipo</th></th>
                            <th class="table-head">Categoria</th>
                            <th class="table-head">Conta</th>
                            <th class="table-head">Valor</th>
                            <th class="table-head">Vencimento</th>
                            <th class="table-head">Status</th>
                            <th class="table-head">Ações</th>
                        </tr>
                        @foreach ($movimentacoes as $movimentacao)
                            <tr>
                                <td class="">{{$movimentacao->name}}</td>
                                <td class="">{{$movimentacao->type_movement}}</td></th>
                                <td class="">{{$movimentacao->category}}</td>
                                <td class="">{{$movimentacao->financial_account}}</td>
                                <td class="">R$ {{number_format($movimentacao->value, 2, ',', '.')}}</td>
                                <td class="">{{$movimentacao->date}}</td>
                                <td class="{{$movimentacao->state}}">{{ucwords($movimentacao->state)}}</td>
                                <td class="">
                                    <div class="fs-6 d-flex justify-content-center">
                                        <form action="{{ route('exibir.movimentacao', ['movimentacao' => $movimentacao->id]) }}">
                                            <input type="hidden" name="id" value="{{$movimentacao->id}}">
                                            <button class="fas fa-exclamation-circle mx-2 text-info acoes">
                                            </button>
                                        </form>

                                        <form action="{{ route('editarForm.movimentacao') }}">
                                            <input type="hidden" name="id" value="{{$movimentacao->id}}">
                                            <button class="far fa-edit mx-2 text-success acoes"></button>
                                        </form>

                                        <form class="mx-2" action="{{ route('apagar.movimentacao', ['movimentacao' => $movimentacao->id]) }}" method='post'>
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{$movimentacao->id}}">
                                            <button type="button" class="fas fa-trash text-danger acoes" type="submit" value="" data-bs-toggle="modal" data-bs-target="#modalDeletar{{$movimentacao->id}}">
                                            </button>
                                            @component('components.modal-deletar', ['id' => $movimentacao->id])
                                            @endcomponent

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col col-6 my-4">
                    <div class="d-flex justify-content-between text-success">
                        <p class="fst-italic m-0 margin-none">Total de Crédito</p>
                        <p class="fw-bold margin-none">R$ {{number_format($credito, 2, ',', '.')}}</p>
                    </div>
                    <div class="d-flex justify-content-between text-danger">
                       <p class="fst-italic  margin-none">Total de Débito</p>
                       <p class="fw-bold margin-none">R$ - {{number_format($debito, 2, ',', '.')}}</p>
                    </div>
                    <div class="d-flex justify-content-between text-primary">
                        <p class="fst-italic  margin-none">Valor Total</p>
                        <p class="fw-bold margin-none">R$ {{number_format($total, 2, ',', '.')}}</p>

                    </div>
                </div>

                <div  class="d-flex justify-content-between">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                    <a href="{{ route('adicionar') }}" class="btn btn-outline-success lead text-decoration-none">+Adicionar</a>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
