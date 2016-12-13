@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="login-panel panel panel-default">
                @if (isset($erro))
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <h1>{{ $erro }}</h1> 
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
      location.href="{{ url('/') }}";
    }, 3000);
</script>