@extends('layouts.erro')

@section('content')
<div class="container">
    @if (isset($erro))
        <h1 class="text-center">{{ $erro }}</h1>
		<div class="erroDB"></div>
    @endif
</div>
@endsection
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
      location.href="{{ url('/') }}";
    }, 9000);
</script>