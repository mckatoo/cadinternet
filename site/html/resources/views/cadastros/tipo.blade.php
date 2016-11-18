<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    Cadastros de {{$titulo}}
                </h4>
                <div class="pull-right painel-com-botao">
                    <button type="button" data-toggle="modal" data-target="#novo" class="btn btn-primary" id="btnNovo">
                        <i class="fa fa-plus"></i> Novo Cadastro
                    </button>
                </div>
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
                                        <a href="#" class="btn btn-xs btn-success" id="btnEditar">
                                            <i class="fa fa-edit"></i> Editar
                                    @endif
                                    </a>
                                </td>
                                <td class="centro-total">
                                    <a class="btn btn-xs btn-danger">
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
</div>

<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Cadastrar {{$titulo}}</h4>
      </div>
      <div class="modal-body">
          @include('cadastros.form')
      </div>
      <div class="modal-footer">
        <button id="btnFechar" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button id="btnPreCadastro" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    if ( $.fn.dataTable.isDataTable( '#dataTables' ) ) {
    table = $('#dataTables').DataTable();
    }
    else {
        table = $('#dataTables').DataTable({
            "language": {
    		    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
    		},
            "responsive": true,
            "order": [[ 4, "asc" ]]
        });
    }
});

// INICIO MASCARAS
$('#nome').keyup(function() {
    this.value = this.value.replace(/[^\w\.][ ]|\d/g, '');
});
$('#MAC').mask("AA:AA:AA:AA:AA:AA");
$('#IP').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
        'Z': {
        pattern: /[0-9]/, optional: true
        }
    }
});
//FIM MASCARAS

//INICIO EVENTOS DE BOTÕES
$('#btnNovo').on('click', function(){
    $('#grupoIP').addClass('hidden');
    var formulario = document.querySelector("#formCadastros");
    formulario.setAttribute("action", "cadastros/salvar");
});



$('#btnFechar').on('click', function(){
    $('.form-horizontal')[0].reset();
});

$('#btnPreCadastro').on('click', function(){
    $.ajax({
        data: $('.form-horizontal').serialize(),
        type: $('.form-horizontal').attr('method'),
        url: $('.form-horizontal').attr('action'),
        success: function(response) {
            $('.conteudo').html(response);
        }
    });
    $('.modal-backdrop').fadeOut(1000);
    $('.bg-gradient').fadeOut(1000);
    $('.loading').fadeOut(1000);
    // return false;
});

//FIM EVENTOS DE BOTÕES

setTimeout(function(){
  $('.alert').fadeOut();
}, 3000);
</script>
