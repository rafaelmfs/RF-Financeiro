<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h4>{{ __('Error') }}</h4>
        </h2>
    </x-slot>
    <div class="container border bg-white rounded-3 p-5">
        <div class="d-flex justify-content-center">
            <div class="error text-center">
                <i class="fas fa-times-circle"></i>
                <h1 class="display-1">Ops...</h1>
                <div class="fs-3 fw-bold text-muted">
                    <p>Algo inesperado aconteceu.</p>
                    <p>Sinto muito mas não foi possivel completar esta ação.</p>
                    <a href="javascript:history.back()" class="btn px-5 mt-5 rounded-pill">Tentar novamente</a>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
