@extends('layouts.admtables')

@section('content')
    <div id="page-wrapper" class="conteudo">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-thumbs-up fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge contaOK">{{ $conta['OK'] }}</div>
                                <div>OK!</div>
                            </div>
                        </div>
                    </div>
                    <a id="ok" href="#">
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
                                <i class="fa fa-edit fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge contaOK">{{ $conta['CADASTRANDO'] }}</div>
                                <div>Cadastrando...</div>
                            </div>
                        </div>
                    </div>
                    <a id="cadastrando" href="#">
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
                                <i class="fa fa-thumbs-o-down fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge contaOK">{{ $conta['PENDENTES'] }}</div>
                                <div>Pendentes...</div>
                            </div>
                        </div>
                    </div>
                    <a id="pendente" href="#">
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
                                <i class="fa fa-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge contaOK">{{ $conta['TODOS'] }}</div>
                                <div>Todos!</div>
                            </div>
                        </div>
                    </div>
                    <a id="todos" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" id="lista">
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

@endsection
