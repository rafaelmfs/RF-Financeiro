<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultar') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2 class="display-5">O que deseja consultar ?</h2>
            <div class="border bg-light rounded-3 p-5">
                <div class="d-flex my-4">
                    <a href="{{ route('categorias.listar') }}" class="link-success lead text-decoration-none fs-3">
                        <i class="fas fa-tags"></i>
                        Categorias cadastradas
                    </a>
                </div>
                <div class="d-flex my-4">
                    <a href="{{ route('contas.listar') }}" class="link-success lead text-decoration-none fs-3">
                        <i class="fas fas fa-folder-open"></i>
                        Contas financeiras cadastradas
                    </a>
                </div>
                <div class="d-flex my-4">
                    <a href="{{ route('movimentacoes.listar') }}" class="link-success lead text-decoration-none fs-3">
                        <i class="fas fa-coins"></i>
                        Movimentações cadastradas
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

