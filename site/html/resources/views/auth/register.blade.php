@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registre-se</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                        <select class="form-control" name="tipo">
                                            <option value="">TIPO DE USUÁRIO...</option>
                                            @foreach ($tipo as $tp)
                                                <option value="{{$tp->id}}">{{$tp->tipo}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input placeholder="NOME" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="E-MAIL" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input placeholder="SENHA" id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                        <input placeholder="CONFIRME A SENHA" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </fieldset>

                            <fieldset>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        Registrar
                                    </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
