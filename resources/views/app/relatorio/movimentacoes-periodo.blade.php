<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimentações') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2>Filtrar por:</h2>
            <form method="post" action="{{ route('exibir.relatorio.movimentacoes') }}"  target="_blank">
                @csrf
                <div>
                    <label class="">Período:</label>
                    <div class="d-flex mb-2">
                        <div name="timeCourse" class="d-flex">
                            <input type="date" class="form-control" name="start">
                            <span class="p-2">-</span>
                            <input type="date" class="form-control" name="end">
                        </div>
                        <button class="btn btn-dark ms-5" ><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
