<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2 class="display-5">Categorias</h2>
            <div class="border bg-light rounded-3 p-5 detail">
                <table class="table">
                    <tr>
                        <th class="fs-4 table-head">Nome</th>
                        <th class="fs-4 table-head">Ações</th>
                    </tr>
                    @foreach ($categorias as $i => $categoria)
                        <tr>
                            <td class="fs-6">{{$categoria->name}}</td>
                            <td class="fs-6 d-flex justify-content-center">
                                <button class="far fa-edit mx-2 text-success acoes" data-bs-toggle="modal" data-bs-target="#modalCategoria{{$categoria->id}}">
                                </button>
                                @include('app.consultar.modal-editar-categoria')


                                <form class="mx-2" action="{{ route('apagar.categoria', ['categoria' => $categoria->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$categoria->id}}">
                                    @if($categoria->deletavel)
                                        <button type="button" class="fas fa-trash text-danger acoes" value="" data-bs-toggle="modal" data-bs-target="#modalDeletar{{$categoria->id}}">
                                        </button>
                                    @else
                                        <button class="delete fas fa-trash text-danger text-opacity-50" value="" disabled='disabled'>
                                        </button>
                                    @endif
                                    @component('components.modal-deletar', ['id' => $categoria->id])
                                    @endcomponent
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div  class="d-flex justify-content-between">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                    <a href="{{ route('adicionar.categoria') }}" class="btn btn-outline-success lead text-decoration-none">+Adicionar</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
