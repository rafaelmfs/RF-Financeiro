<!-- Button trigger modal -->
{{-- <button >
    <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{-- {{ route('users.editForm', ['user' => $user->id]) }}"></a>
</button> --}}


<!-- Modal -->
<div class="modal fade" id="modalCategoria{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{ route('editar.categoria', [ 'categoria' => $categoria]) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3 row p-2">
                    <label for="nome" class="form-label align-baseline col-2 py-1">Nome:</label>
                    <input type="text" class="form-control col" id="" name="nome" value="{{$categoria->name}}">
                </div>
                <div class="mb-3 row p-2">
                    <label for="type" class="form-label col-2 py-1">Tipo:</label>
                    <select class="form-select col" name="tipo">
                        <option selected></option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
