@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Trocar sua Senha</h3>
                    </div>

                    <div class="panel-body">
                        @if (session('status')!==null)
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <strong>Sucesso!</strong> {{ session('status') }}
                            </div>
                        @endif
                        @if (isset($erro))
                            <div class="alert alert-danger">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <strong>Erro!</strong> {{ $erro }}
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ url('/salva/reset') }}">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{ $token }}">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input placeholder="EMail" id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input placeholder="Nova senha" id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input placeholder="Confirme a nova senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
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