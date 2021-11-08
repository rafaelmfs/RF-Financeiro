@include('app.relatorio.cabecalho', ['relatorio' => 'Movimentações'])

<table class="table mt-4">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Data</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Categoria</th>
      <th scope="col">Conta Financeira</th>
      <th scope="col">Valor</th>
      <th scope="col">Ultima-atualização</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
        @php
            $cont = 1;
        @endphp
    {{-- @foreach ( as ) --}}
        <tr style="font-size:11px">
            <th>{{$cont}}</th>
            <td scope="col">Data</td>
            <td scope="col">Nome</td>
            <td scope="col">Tipo</td>
            <td scope="col">Categoria</td>
            <td scope="col">Conta Financeira</td>
            <td scope="col">Valor</td>
            <td scope="col">Ultima-atualização</td>
            <td scope="col">Status</td>
        </tr>
        @php
            $cont++;
        @endphp

    {{-- @endforeach --}}
  </tbody>
</table>

@include('app.relatorio.rodape')
