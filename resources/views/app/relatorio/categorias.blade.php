@include('app.relatorio.cabecalho', ['relatorio' => 'categorias', 'usuario' => $usuario])

<table class="table my-5" style="margin: 5% auto; width: 90%">
  <thead>
    <tr>
      <th scope="col" style="text-align: start;">Data</th>
      <th scope="col" style="text-align: start;">Nome</th>
      <th scope="col" style="text-align: start;">Ultima atualização</th>
    </tr>
  </thead>
  <tbody>
    @php
        $cont = 1;
    @endphp
    @foreach ($categorias as $categoria)
        <tr>
            <td>
                @php
                    $criacao = strtotime($categoria->created_at);
                    $criacao = date('d-m-Y', $criacao);
                    $criacao = str_replace('-', '/', strval($criacao));
                @endphp
                {{$criacao}}
            </td>
            <td>{{$categoria->name}}</td>
            <td>
                @php
                    $atualizacao = strtotime($categoria->updated_at);
                    $atualizacao = date('d-m-Y * H:i', $atualizacao);
                    $atualizacao = str_replace('-', '/', strval($atualizacao));
                    $atualizacao = str_replace('*', 'às', strval($atualizacao));
                @endphp
                {{$atualizacao}}
            </td>
        </tr>
        @php
            $cont++;
        @endphp

    @endforeach
  </tbody>
</table>
@include('app.relatorio.rodape')
