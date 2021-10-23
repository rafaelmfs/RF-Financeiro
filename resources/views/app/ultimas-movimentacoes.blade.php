<div class="card detail">
    <div class="detail-header">
        <h2 class="my-2">Últimas Movimentações</h2>
        <button class="my-2">Veja mais</button>
    </div>
    <table class="table">
        <tr>
            <th class="table-head">Nome</th>
            <th class="table-head">Categoria</th>
            <th class="table-head">Conta</th>
            <th class="table-head">Valor</th>
            <th class="table-head">Tipo</th>

        </tr>
            @for ($cont = (count($movimentacoes)-1); $cont>=0 ; $cont --)
                <tr>
                    <td>{{$movimentacoes[$cont]->name}}</td>
                    <td>{{$movimentacoes[$cont]->category}}</td>
                    <td>{{$movimentacoes[$cont]->financial_account}}</td>
                    <td>R$ {{str_replace('.', ',', strval($movimentacoes[$cont]->value) )}}</td>
                    <td>{{($movimentacoes[$cont]->type_movement)}}</td>
                </tr>
            @endfor
    </table>
</div>
