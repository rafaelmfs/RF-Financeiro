<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-4">Olá {{$user->name}}</h2>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Data</th>
                            <th scope="col">Conta</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction )
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">{{$transaction->date}}</th>
                                <th scope="col"></th>
                                <th scope="col">{{$transaction->category}}</th>
                                <th scope="col">{{$transaction->Descricao}}</th>
                                <th scope="col">{{$transaction->value}}</th>
                                <th scope="col">{{$transaction->state}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
