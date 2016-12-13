<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @if (isset($erro))
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <h1>{{ $erro }}</h1> 
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
      location.href="url('/')";
    }, 3000);
</script>
