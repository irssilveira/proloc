@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card card-container">
            <p id="profile-name" class="profile-name-card">Registro usuário</p>
            <br />
            <form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}


                <input type="text" id="inputNome" class="form-control" placeholder="Informe o nome" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Informe o email" required />
                @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input id="password" placeholder="Informe a senha" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirma a senha" name="password_confirmation" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Registrar</button>
            </form>
        </div>


    </div>

@endsection
