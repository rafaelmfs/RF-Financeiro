@include('app.relatorio.cabecalho', ['relatorio' => 'Movimentações', 'usuario' => $usuario])

<table class="table my-5" style="margin: 5% 0">
  <thead>
    <tr style="font-size:13px">
      <th scope="col">Data</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Categoria</th>
      <th scope="col" style="padding: 0 6px">Conta Financeira</th>
      <th scope="col">Valor</th>
      <th scope="col">Vencimento</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($movimentacoes as $movimentacao)
        <tr style="font-size:12px;">
            <td scope="col" style="padding: 4px 6px">
                @php
                    $criacao = strtotime($movimentacao->created_at);
                    $criacao = date('d-m-Y', $criacao);
                    $criacao = str_replace('-', '/', strval($criacao));
               @endphp
                {{$criacao}}</td>
            <td scope="col" style="padding: 4px 6px">{{$movimentacao->name}}</td>
            <td scope="col" style="padding: 4px 6px">{{$movimentacao->type_movement}}</td>
            <td scope="col" style="padding: 4px 6px; text-align: center;">{{$movimentacao->category}}</td>
            <td scope="col" style="padding: 4px 6px; text-align: center;">{{$movimentacao->financial_account}}</td>
            <td scope="col" style="padding: 4px 6px">R$ {{number_format($movimentacao->value, 2, ',', '.')}}</td>
            <td scope="col" class="text-center" style="padding: 4px 6px">
                @if(!empty($movimentacao->date))
                @php
                    $vencimento = strtotime($movimentacao->date);
                    $vencimento = date('d-m-Y', $vencimento);
                    $vencimento = str_replace('-', '/', strval($vencimento));
                @endphp
                    {{$vencimento}}
                @else
                   &nbsp;
                @endif
            </td>
            <td scope="col"  class="text-center" style="padding: 4px 6px; text-align: right;">{{$movimentacao->state}} </td>
        </tr>

    @endforeach
  </tbody>
</table>

<div class="col-md-5 my-2 valores">
        <p class="fst-italic m-0 margin-none" style="margin:8px 0;">Valor Total de Entradas Confirmadas: R$ {{number_format($credito, 2, ',', '.')}}</p>
        <p class="fst-italic  margin-none" style="margin:8px 0;">Valor Total de Saídas Confirmadas: R$ - {{number_format($debito, 2, ',', '.')}}</p>
        <p class="fst-italic  margin-none" style="margin:8px 0;">Valor Total de movimentações confirmadas: R$ {{number_format($total, 2, ',', '.')}}</p>
        <p class="fst-italic  margin-none" style="margin:8px 0;">Quantidade de movimentações Pendentes: {{$pendentes}}</p>
        <p class="fst-italic  margin-none" style="margin:8px 0;">Quanditade de movimentações Confirmadas: {{$confirmadas}}</p>
</div>

 <div class="d-flex p-2 my-4 valores">
        <i class="fas fa-exclamation-circle p-1 text-warning"></i> <p class="px-1"><b>Atenção</b>, os calculos de valores gerais são baseados nas movimentações que estão com status confirmado.</p>
</div>

@include('app.relatorio.rodape')
