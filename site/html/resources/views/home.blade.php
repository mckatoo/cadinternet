@extends('layouts.adm')

@section('content')
<div id="page-wrapper" class="conteudo">
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-thumbs-up fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK">{{ $conta['OK'] }}</div>
              <div>OK!</div>
            </div>
          </div>
        </div>
        <a id="ok" href="{{route('cadastros.status', '3')}}">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-edit fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK">{{ $conta['CADASTRANDO'] }}</div>
              <div>Cadastrando...</div>
            </div>
          </div>
        </div>
        <a id="cadastrando" href="{{route('cadastros.status', '2')}}">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-thumbs-o-down fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK">{{ $conta['PENDENTES'] }}</div>
              <div>Pendentes...</div>
            </div>
          </div>
        </div>
        <a id="pendente" href="{{route('cadastros.status', '1')}}">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-list-alt fa-3x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge contaOK">{{ $conta['TODOS'] }}</div>
              <div>Todos!</div>
            </div>
          </div>
        </div>
        <a id="todos" href="{{route('cadastros.status')}}">
          <div class="panel-footer">
            <span class="pull-left">Ver Detalhes</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
@if (isset($titulo))
  <input type="hidden" name="titulo" id="titulo" value="{{$titulo}}">
@endif
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      @if (isset($titulo))
        {{$titulo}}
      @else
        Resultado da Pesquisa
      @endif
    </div>
    @if (isset($mensagem))
    <div class="alert alert-success">{{$mensagem}}</div>
    @endif
    {{-- /.panel-heading --}}
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
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
              <a href="#" class="btn btn-xs btn-danger" onclick="apagarCadastro({{$req->id}})">
                <i class="fa fa-recycle"></i> Apagar
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="8">
              {{$requisicoes->render()}}
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection
