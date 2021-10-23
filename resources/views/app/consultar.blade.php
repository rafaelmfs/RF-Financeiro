<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultar') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2>Filtrar por:</h2>
            <form>
                <div class="d-flex justify-content-between mb-2">
                    <select name="filter" class="form-select" id="consult-select">
                        <option selected>Escolha o filtro</option>
                        <option id="categories" value="category">Categorias</option>
                        <option id="financialAccounts" value="financialAccount">Conta financeira</option>
                        <option id="financialTransactions" value="financialTransactions" >Movimentações</option>
                    </select>
                    <select name="category" class="form-select mx-2" id="category">
                        @foreach ($categorias as $categoria)
                            <option value="{{strtolower($categoria->id)}}">{{$categoria->name}}</option>
                        @endforeach
                    </select>
                    <select name="account" class="form-select mx-2" id="account">
                        @foreach ($contas as $conta)
                            <option value="{{strtolower($conta->id)}}">{{$conta->name}}</option>
                        @endforeach
                    </select>
                    <select name="type" class="form-select mx-2" id="type">
                        <option selected value="1">Crédito</option>
                        <option value="2">Débito</option>
                    </select>
                    <div name="timeCourse" class="d-flex" id="timeCourse">
                        <label class="px-4 py-2">Período: </label>
                        <input type="date" class="form-control" name="start">
                        <span class="p-2">-</span>
                        <input type="date" class="form-control" name="end">
                    </div>
                    <button class="btn btn-primary" ><i class="fas fa-search"></i></button>
                 </div>
            </form>

            <div class="border bg-light rounded-3 p-5">

            </div>
        </div>

    </div>

    <script src="{{ asset('js/consult.js')}}"></script>


</x-app-layout>

