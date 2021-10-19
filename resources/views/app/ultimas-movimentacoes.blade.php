<div class="card detail">
    <div class="detail-header">
        <h2 class="my-2">Últimas Movimentações</h2>
        <button class="my-2">Veja mais</button>
    </div>
    <table>
        <tr>
            <th>ID #</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Conta</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Última atualização</th>
            <th>Status</th>
        </tr>
        @foreach ($movimentacoes as $movimentacao)
            @php
                $cont = 0;
            @endphp

            <tr>
                <td>{{$movimentacao->id}}</td>
                <td>{{$movimentacao->name}}</td>
                <td>{{$movimentacao->category}}</td>
                <td>{{$movimentacao->financial_account}}</td>
                <td>R$ {{str_replace('.', ',', strval($movimentacao->value) )}}</td>
                <td>{{str_replace('-', '/', strval($movimentacao->date) )}}</td>
                <td>{{str_replace('-', '/', strval($movimentacao->updated_at) )}}</td>
                <td><span class="status {{$movimentacao->state}}">
                    <i class="fas fa-circle"> {{ucwords($movimentacao->state)}}</i></span></td>
            </tr>

            @php
                if($cont == 9){
                    break;
                }
                $cont++;
            @endphp
        @endforeach
    </table>
</div>
