<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimentações') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container my-2">
            <h2>Filtrar por:</h2>
            <form method="post" action="{{ route('movimentacoes.listar') }}">
                @csrf
                <div class="row mb-2">
                    <div class="col col-md-4">
                        <labeL>Categoria:</labeL>
                        <select name="category" class="form-select">
                            <option value="" selected></option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-4">
                        <labeL>Conta financeira:</labeL>
                        <select name="account" class="form-select">
                            <option value="" selected></option>
                            @foreach ($contas as $conta)
                                <option value="{{$conta->id}}">{{$conta->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-4">
                        <label>Tipo:</label>
                        <select name="type" class="form-select">
                            <option value="" selected>Todos</option>
                            <option value="1">Crédito</option>
                            <option value="2">Débito</option>
                        </select>
                    </div>
                </div>
                <label class="">Período:</label>
                <div class="d-flex justify-content-between mb-2">
                    <div name="timeCourse" class="d-flex">
                        <input type="date" class="form-control" name="start">
                        <span class="p-2">-</span>
                        <input type="date" class="form-control" name="end">
                    </div>
                    <button class="btn btn-primary ms-2" ><i class="fas fa-search"></i></button>
                 </div>
            </form>

        </div>
    </div>

</x-app-layout>



































