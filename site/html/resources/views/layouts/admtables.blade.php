<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS COMPILADO PELO GULP -->
    <link href="{{ elixir('css/admtables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
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
                        {{-- <form action="{{ url('logout') }}" method="post" enctype="multipart/form-data" id="logout">
                            {{csrf_field()}}
                            <li><a href="#" onclick="$('#logout').submit();"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </form> --}}
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
                            <a href="index.html"><i class="fa fa-home fa-fw"></i> Principal</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-history fa-fw"></i> Pendentes</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-pencil fa-fw"></i> Alunos</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-graduation-cap fa-fw"></i> Professores</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-user fa-fw"></i> Funcionários</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        @yield('content')
        <div class="bg-gradient">
        </div>
        <div class="loading">
            AGUARDE...
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- JAVASCRIPT COMPILADO PELO GULP -->
    <script src="{{ elixir('js/admtables.js') }}"></script>

</body>

</html>
