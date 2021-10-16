<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar conta financeira') }}
        </h2>
        <div class="p-4">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-2">
                        <h1 class="display-5">Por que criar uma conta financeira ?</h1>
                        <p class="fs-5 fw-light text-muted p-3">Com uma conta financeira você pode separar suas movimentações em grupos, por exemplo,
                        se você quiser cadastrar desepesas relacionadas somente a casa, carro ou até mesmo alguma renda de um serviço específico,
                        nesse caso poderia criar uma conta financeir e assim poderá filtrar somente o que tem cadastrado nessa conta.</p>
                    </div>
                </div>
                <div class="container-fluid border py-5 px-4 mb-4 rounded-3">
                    <h3>Adicionar nova conta financeira</h3>
                    <form action="{{ route('salvar.conta-financeira') }}" method="post">
                        @csrf
                        <div class="mb-3 row p-2">
                            <label for="name" class="form-label align-baseline col-1 py-1">Nome:</label>
                            <input type="text" class="form-control col" id="" name="name" placeholder="Digite um nome a sua conta financeira">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('adicionar') }}" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                            <button type="submit" class="btn btn-success px-5 ms-2">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/forms.js')}}"></script>
    </x-slot>

</x-app-layout>
