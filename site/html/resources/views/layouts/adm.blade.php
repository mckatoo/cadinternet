<!DOCTYPE html>
<html lang="pt-BR" ng-app="CadInternetApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Milton Carlos Katoo">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS COMPILADO PELO GULP -->
    <link href="{{ elixir('css/adm.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">

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
        @include('layouts.nav')
        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- JAVASCRIPT COMPILADO PELO GULP -->
    <script src="{{ elixir('js/adm.js') }}"></script>

</body>

</html>
