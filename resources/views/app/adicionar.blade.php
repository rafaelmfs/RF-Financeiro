<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar') }}
        </h2>
        <div class="p-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value={{$categoria->id}}>{{ucwords($categoria->name)}}</option>
                            @endforeach
                        </select>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Conta</option>
                            @foreach ($contas as $conta)
                                <option value={{$conta->id}}>{{ucwords($conta->name)}}</option>
                            @endforeach
                        </select>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Tipo</option>
                            @foreach ($tipos as $tipo)
                                <option value={{$tipo->id}}>{{ucwords($tipo->name)}}</option>
                            @endforeach
                        </select>

                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
