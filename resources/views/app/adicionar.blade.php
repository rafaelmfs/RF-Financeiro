<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <div>
                <a href="{{ route('adicionar.conta') }}" class="link-success lead text-decoration-none">+Adicionar Conta Financeira</a>
            </div>
            <div>
                <a href="{{ route('adicionar.categoria') }}"class="link-success lead text-decoration-none">+Adicionar Categorias</a>
            </div>
        </div>
        <div class="container border bg-light rounded-3 p-5">

            <form class="" action="{{ route('salvar.transacao') }}" method="post">
                @csrf
                <h2 class="mb-4">Adicionar Nova Transação</h2>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control required-field" id="" name="name" placeholder="Digite um nome para essa movimentação">
                        <p class="text-danger text-error"><em>O campo Nome é obrigatório.</em></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="type" class="form-label">Tipo:</label>
                        <select class="form-select required-field" name="type">
                            <option value="" selected>Escolha Crédito ou Débito</option>
                            @foreach ($tipos as $tipo)
                                <option value={{$tipo->id}}>{{ucwords($tipo->name)}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger text-error"><em>O campo Tipo é obrigatório.</em></p>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="account" class="form-label">Conta Financeira:</label>
                        <select class="form-select required-field" name="account">
                            <option value="" selected>Selecione uma Conta</option>
                            @if (is_iterable($contas))
                                @foreach ($contas as $conta)
                                    <option value={{$conta->id}}>{{ucwords($conta->name)}}</option>
                                @endforeach
                            @else
                                <option value={{$contas->id}}>{{ucwords($contas->name)}}</option>
                            @endif
                        </select>
                        <p class="text-danger text-error"><em>O campo Conta é obrigatório.</em></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="category" class="form-label">Categoria:</label>
                        <select class="form-select required-field" name="category">
                            <option value="" selected>Selecione uma Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value={{$categoria->id}}>{{ucwords($categoria->name)}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger text-error"><em>O campo Categoria é obrigatório.</em></p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="valueTransaction" class="form-label">Valor:</label>
                        <input type="number" min="0" step="0.01" class="form-control required-field" id="" name="valueTransaction" placeholder="Digite o valor, somente numeros">
                        <p class="text-danger text-error"><em>O campo valor é obrigatório.</em></p>

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="dueDate" class="form-label">Vencimento:</label>
                        <input type="date" class="form-control" id="" name="dueDate" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3 status">
                    <label for="state" class="form-label">Status: </label>
                    <select class="form-select required-field" name="state">
                        <option value="confirmado">Confirmado</option>
                        <option value="pendente">Pendente</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary px-5 me-2">Voltar </a>
                    <button id="btnSave" type="submit" class="btn btn-success px-5 ms-2">Salvar</button>
                </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('js/forms.js')}}"></script>


</x-app-layout>
