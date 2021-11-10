@include('app.relatorio.cabecalho', ['relatorio' => 'Conta financeira'])
<table class="table my-5" style="margin: 5% auto; width: 80%">
  <thead>
    <tr>
      <th scope="col"  style="text-align: start;">Data</th>
      <th scope="col"  style="text-align: start;">Nome</th>
      <th scope="col"  style="text-align: start;">Ultima atualização</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($contas as $conta)
        <tr>
            <td>
                @php
                    $criacao = strtotime($conta->created_at);
                    $criacao = date('d-m-Y', $criacao);
                    $criacao = str_replace('-', '/', strval($criacao));
                @endphp
                {{$criacao}}
            </td>
            <td>{{$conta->name}}</td>
            <td>
                @php
                    $atualizacao = strtotime($conta->updated_at);
                    $atualizacao = date('d-m-Y * H:i', $atualizacao);
                    $atualizacao = str_replace('-', '/', strval($atualizacao));
                    $atualizacao = str_replace('*', 'às', strval($atualizacao));
                @endphp
                {{$atualizacao}}
            </td>
        </tr>

    @endforeach
  </tbody>
</table>

@include('app.relatorio.rodape')
