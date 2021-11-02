<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Movimentação') }}
        </h2>
    </x-slot>

    <div class="sm:px-2 lg:px-4">
        <div class="container border bg-light rounded-3 p-5">

            <form class="" action="{{ route('editar.movimentacao', ['movimentacao' => $movimentacao->id]) }}" method="post">
                @csrf
                @method('put')
                <h2 class="mb-4">Editar:</h2>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" maxlength="25" class="form-control required-field" id="" name="nome" value="{{$movimentacao->name}}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select class="form-select required-field" name="tipo">
                            <option value="" selected>{{$movimentacao->type_movement}}</option>
                            @foreach ($tipos as $tipo)
                                <option value={{$tipo->id}}>{{ucwords($tipo->name)}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="conta" class="form-label">Conta Financeira:</label>
                        <select class="form-select required-field" name="conta">
                            <option value="" selected>{{$movimentacao->financial_account}}</option>
                            @if (is_iterable($contas))
                                @foreach ($contas as $conta)
                                    <option value={{$conta->id}}>{{ucwords($conta->name)}}</option>
                                @endforeach
                            @else
                                <option value={{$contas->id}}>{{ucwords($contas->name)}}</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <select class="form-select required-field" name="categoria">
                            <option value="" selected>{{$movimentacao->category}}</option>
                            @foreach ($categorias as $categoria)
                                <option window.StopWhateverBelow() value={{$categoria->id}}>{{ucwords($categoria->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="valueTransaction" class="form-label">Valor:</label>
                        <input type="number" min="0.00" step="0.01" class="form-control required-field" id="" name="valorMovimentacao" value="{{$movimentacao->value}}" required>

                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="dataVencimento" class="form-label">Vencimento:</label>
                        <input type="date" class="form-control" id="" name="dataVencimento" aria-describedby="emailHelp" value="{{$movimentacao->date}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="" name="descricao" rows="3" required>{{$movimentacao->description}}</textarea>
                </div>
                <div class="mb-3 status">
                    <label for="status" class="form-label">Status: </label>
                    <select class="form-select required-field" name="status">
                        <option value="">{{$movimentacao->state}}</option>
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




</x-app-layout>
