<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> | {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('auth.registro') }}"><i class="fa fa-user fa-fw"></i> Cadastrar Administradores</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Mudar Senha</a>
                </li>
                <li class="divider"></li>
                <form action="{{ route('auth.sair') }}" method="post" id="frmSair">
                    {{ csrf_field() }}
                    <li><a href="#" onclick="$('#frmSair').submit()">
                        <i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </form>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <form action=" {{ route('cadastros.pesquisa') }} " method="post" id="frmPesquisar">
                        {{ csrf_field() }}
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Buscar..." name="pesquisar">
                            <span class="input-group-btn">
                            <a class="btn btn-default" onclick="$('#frmPesquisar').submit()">
                                <i class="fa fa-search"></i>
                            </a>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </form>
                </li>
                <li>
                    <a href="{{ route('home') }}" id="Principal" class="itemenu active"><i class="fa fa-home fa-fw"></i> Principal</a>
                </li>
                <li>
                    <a href="{{route('cadastros.tipo', '1')}}" id="tipoAluno" class="itemenu"><i class="fa fa-pencil fa-fw"></i> Alunos</a>
                </li>
                <li>
                    <a href="{{route('cadastros.tipo', '2')}}" id="tipoProfessor" class="itemenu"><i class="fa fa-graduation-cap fa-fw"></i> Professores</a>
                </li>
                <li>
                    <a href="{{route('cadastros.tipo', '3')}}" id="tipoFuncionario" class="itemenu"><i class="fa fa-user fa-fw"></i> Funcionários</a>
                </li>
                <li>
                    <a href="#" class="itemenu"><i class="fa fa-warning fa-fw"></i> Configurações</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
