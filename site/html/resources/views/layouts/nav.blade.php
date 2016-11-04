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
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Cadastrar Administradores</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Mudar Senha</a>
                </li>
                <li class="divider"></li>
                <li><a href="#" onclick="$.post({{ url('logout') }}">
                    <i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>
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
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{ route('home') }}" id="Principal" class="itemenu active"><i class="fa fa-home fa-fw"></i> Principal</a>
                </li>
                <li>
                    <a href="#" id="tipoAluno" class="itemenu"><i class="fa fa-pencil fa-fw"></i> Alunos</a>
                </li>
                <li>
                    <a href="#" id="tipoProfessor" class="itemenu"><i class="fa fa-graduation-cap fa-fw"></i> Professores</a>
                </li>
                <li>
                    <a href="#" id="tipoFuncionario" class="itemenu"><i class="fa fa-user fa-fw"></i> Funcionários</a>
                </li>
                <li>
                    <a href="#" id="Configuracoes" class="itemenu"><i class="fa fa-user fa-fw"></i> Configurações</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
