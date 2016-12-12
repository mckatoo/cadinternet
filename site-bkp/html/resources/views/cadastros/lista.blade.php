<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
<input type="hidden" name="titulo" id="titulo" value="{{$titulo}}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            {{$titulo}}
        </div>
        @if (isset($mensagem))
            <div class="alert alert-success">{{$mensagem}}</div>
        @endif
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>RA RE Funcional</th>
                        <th>Campus</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Cadastrado em</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisicoes as $req)
                        <tr class="odd gradeX">
                            <td class="centro-esquerda">{{$req->nome}}</td>
                            <td class="centro-esquerda">{{$req->rarefunc}}</td>
                            <td class="centro-total">{{$req->campus->campus}}</td>
                            <td class="centro-total">
                                @if ($req->status->status == 'OK')
                                    <button class="btn btn-primary btn-social-icon" title="Já foi cadastrado!">
                                        <i class="fa fa-thumbs-up"></i>
                                    </button>
                                @endif
                                @if ($req->status->status == 'CADASTRANDO')
                                    <button class="btn btn-warning btn-social-icon" title="Estamos cadastrando...">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                @endif
                                @if ($req->status->status == 'PENDENTE')
                                    <button class="btn btn-danger btn-social-icon" title="Está pendente. Aguarde...">
                                        <i class="fa fa-thumbs-down"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="centro-total">{{$req->tipo->tipo}}</td>
                            <td class="centro-total">{{date('d/m/Y H:i', strtotime($req->created_at))}}</td>
                            <td class="centro-total">
                                @if ($req->status->status == 'PENDENTE')
                                    <a href="#" class="btn btn-xs btn-primary">
                                        <i class="fa fa-save"></i> Cadastrar
                                @endif
                                @if ($req->status->status == 'CADASTRANDO')
                                    <a href="#" class="btn btn-xs btn-success disabled">
                                        <i class="fa fa-save"></i> Cadastrar
                                @endif
                                @if ($req->status->status == 'OK')
                                    <a href="#" class="btn btn-xs btn-success">
                                        <i class="fa fa-edit"></i> Editar
                                @endif
                                </a>
                            </td>
                            <td class="centro-total">
                                <a href="#" class="btn btn-xs btn-danger" onclick="apagar({{$req->id}})">
                                    <i class="fa fa-recycle"></i> Apagar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
// $(document).ready(function() {
//     if ( $.fn.dataTable.isDataTable( '#dataTables' ) ) {
//     table = $('#dataTables').DataTable();
//     }
//     else {
//         table = $('#dataTables').DataTable({
//             "language": {
//     		    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
//     		},
//             responsive: true,
//             "order": [[ 5, "asc" ]],
//             "initComplete": function () {
//                 tmp = 1000;
//                 $('.bg-gradient').fadeOut(tmp);
//                 $('.loading').fadeOut(tmp);
//             }
//         });
//     }
// });
function apagar(id)
{
    token = $("#token").val();
    titulo = $("#titulo").val();
    $.post( "cadastros/apagar", { id: id, _token: token, titulo: titulo})
        .done(function(data) {
            $('#lista').html(data);
    });
};

setTimeout(function(){
  $('.alert').fadeOut();
}, 3000);
</script>