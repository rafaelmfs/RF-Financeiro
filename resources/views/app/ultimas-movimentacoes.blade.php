<div class="card detail">
    <div class="detail-header">
        <h2 class="my-2">Últimas Movimentações</h2>
        <form action="{{ route('movimentacoes.listar')}}" method="post">
            @csrf
            <button  class="my-2">Veja mais</button>
        </form>
    </div>
    <table class="table">
        <tr class="sticky-top">
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
                    {{-- <td>R$ {{str_replace('.', ',', strval() )}}</td> --}}
                    <td>R$ {{number_format($movimentacoes[$cont]->value, 2, ',', '.')}}</td>
                    <td>{{($movimentacoes[$cont]->type_movement)}}</td>
                </tr>
            @endfor
    </table>
</div>
