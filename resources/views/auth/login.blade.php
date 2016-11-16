@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" value="{{ old('email')}}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <select name="unidade_id" class="form-control">
                    <option value="">Escolha a unidade</option>
                    @foreach($unidades as $unidade)
                        <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                    @endforeach
                </select>
                @if ($errors->has('unidade_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('unidade_id') }}</strong>
                    </span>
                @endif
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="remember-me"> Lembrar sessão
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form><!-- /form -->
            <a  style="line-height: 37px;" class="btn btn-lg btn-primary btn-block btn-signin" href="{{ url('/register') }}">
                Registrar
            </a>
            <a href="{{ url('/password/reset')}}" class="forgot-password">
                Esqueceu sua senha?
            </a>
        </div>

    </div>
@endsection
