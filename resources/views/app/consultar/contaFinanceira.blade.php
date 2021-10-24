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
                            <td class="fs-6">Ações</td>
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
