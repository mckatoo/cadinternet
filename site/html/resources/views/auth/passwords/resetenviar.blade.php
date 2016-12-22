@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recuperação de Senha</h3>
                </div>
                <div class="panel-body">
                    @if (isset($erro))
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <strong>{{ $erro }}</strong> 
                        </div>
                    @endif
                    @if (session('erro')!==null)
                      <div class="alert alert-danger">{{session('erro')}}</div>
                    @endif
                    <form role="form" method="POST" action="{{ url('enviar/reset') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" placeholder="SEU ENDEREÇO DE EMAIL" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Enviar link para recuperar senha
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    setTimeout(function(){
      $('.alert').fadeOut();
    }, 3000);
</script>