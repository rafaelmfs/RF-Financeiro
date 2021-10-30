<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conta Financeira') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2 class="display-5">Conta Financeira</h2>
            <div class="border bg-light rounded-3 p-5 detail">
                <table class="table">
                    <tr>
                        <th class="fs-4 table-head">Nome</th>
                        <th class="fs-4 table-head">Ações</th>
                    </tr>
                    @foreach ($contas as $conta)
                        <tr>
                            <td class="fs-6">{{$conta->name}}</td>
                            <td class="fs-6 d-flex justify-content-center">
                                <button class="far fa-edit mx-2" data-bs-toggle="modal" data-bs-target="#modalEditarConta{{$conta->id}}">
                                </button>
                                @include('app.consultar.modal-editar-conta')


                                <form class="mx-2" action="{{ route('apagar.conta', ['conta' => $conta->id]) }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user" value="{{$conta->id}}">
                                    @if($conta->deletavel)
                                        <button type="button" class="fas fa-trash" type="submit" value="" data-bs-toggle="modal" data-bs-target="#modalDeletar{{$conta->id}}">
                                        </button>
                                    @else
                                        <button type="button" class="fas fa-trash delete" type="submit" value="" disabled="disabled">
                                        </button>
                                    @endif
                                    @component('components.modal-deletar', ['id' => $conta->id])
                                    @endcomponent

                                </form>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div  class="d-flex justify-content-between">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                    <a href="{{ route('adicionar.conta') }}" class="btn btn-outline-success lead text-decoration-none">+Adicionar</a>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
