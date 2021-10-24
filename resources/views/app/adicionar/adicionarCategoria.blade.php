<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Categoria') }}
        </h2>
    </x-slot>
    <div class="sm:px-2 lg:px-4">
        <div class="p-5 mb-4 bg-white rounded-3">
            <div class="container-fluid py-2">
                <h1 class="display-5">Por que adicionar categorias ?</h1>
                <p class="fs-5 fw-light text-muted p-3">Porque adicionando categorias você tem a opção de deixar ainda mais organizado as suas movimentações, por exemplo,
                se você fizer uma compra poderia colocar como categoria alimento ou compras do mês, assim poderia filtrar só o que gastou com essa determinada categoria.</p>
            </div>
        </div>
        <div class="container-fluid border py-5 px-4 mb-4 rounded-3">
            <h3>Adicionar nova categoria</h3>
            <form action="{{ route('salvar.categoria') }}" method="post">
                @csrf
                <div class="mb-3 row p-2">
                    <label for="name" class="form-label align-baseline col-1 py-1">Nome:</label>
                    <input type="text" class="form-control col" id="" name="name" placeholder="Digite o nome de uma categoria">
                </div>
                <div class="mb-3 row p-2">
                    <label for="type" class="form-label col-1 py-1">Tipo:</label>
                    <select class="form-select col" name="type">
                        <option selected>Escolha Crédito ou Débito</option>
                        @foreach ($tipos as $tipo)
                            <option value={{$tipo->id}}>{{ucwords($tipo->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                    <button type="submit" class="btn btn-success px-5 ms-2">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/forms.js')}}"></script>

</x-app-layout>
