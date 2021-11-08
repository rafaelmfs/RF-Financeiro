@include('app.relatorio.cabecalho', ['relatorio' => 'Conta financeira'])
<table class="table mt-4">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Data</th>
      <th scope="col">Nome</th>
      <th scope="col">Ultima-atualização</th>
    </tr>
  </thead>
  <tbody>
        @php
            $cont = 1;
        @endphp
    {{-- @foreach ( as ) --}}
        <tr>
            <th>{{$cont}}</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        @php
            $cont++;
        @endphp

    {{-- @endforeach --}}
  </tbody>
</table>

@include('app.relatorio.rodape')
