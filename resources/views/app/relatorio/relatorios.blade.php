<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatorios') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2 class="display-5">Escolha o tipo de relatório: </h2>
            <div class="border bg-light rounded-3 p-5">
                <div class="d-flex my-4">
                    <a href="{{ route('relatorio.categorias') }}" class="link-success lead text-decoration-none fs-3" target="_blank">
                        <i class="fas fa-tags"></i>
                        Relatório de Categorias
                    </a>
                </div>
                <div class="d-flex my-4">
                    <a href="{{ route('relatorio.conta') }}" class="link-success lead text-decoration-none fs-3" target="_blank">
                        <i class="fas fas fa-folder-open"></i>
                        Relatório de Contas financeiras
                    </a>
                </div>
                <div class="d-flex my-4">
                    <a href="{{ route('relatorio.movimentacoes') }}" class="link-success lead text-decoration-none fs-3" target="_blank">
                        <i class="fas fa-coins"></i>
                        Relatório de Movimentações
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
