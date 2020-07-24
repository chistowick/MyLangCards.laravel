@extends('layouts.main')

@section('leftArea')
<!-- Форма входа Sign in -->
<div class="card" id="sign-in-div">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login-post') }}">
            @csrf

            <!-- Email div -->
            <div class="form-group row">
                <label for="email">E-Mail Address</label>
                <div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Password div -->
            <div class="form-group row">
                <label for="password">Password</label>
                <div>
                    <input type="password" name="password" id="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Checkbox div -->
            <div class="form-group row">
                <div>
                    <div>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
            </div>

            <!-- Submit div -->
            <div class="form-group row">
                <div>
                    <button type="submit">Login</button>

                    <a class="btn btn-link" href="/" onclick="event.preventDefault(); 
                document.getElementById('forgot-password-div').style.display = 'block';
                document.getElementById('sign-in-div').style.display = 'none';
                document.getElementById('sign-up-div').style.display = 'none';">
                        Forgot Your Password?
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Форма регистрации нового пользователя Sign up-->
<div class="card" id="sign-up-div">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="POST" action="{{ route('register-post') }}">
            @csrf

            <!-- Name div -->
            <div class="form-group row">
                <label for="name">Name</label>
                <div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Email div -->
            <div class="form-group row">
                <label for="email">E-Mail Address</label>
                <div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Password div -->
            <div class="form-group row">
                <label for="password">Password</label>
                <div>
                    <input id="password" type="password" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Password confirmation div -->
            <div class="form-group row">
                <label for="password-confirm">Confirm Password</label>

                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <!-- Submit div -->
            <div class="form-group row">
                <div>
                    <button type="submit">
                        Register
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Форма запроса ссылки на сброс пароля 'forgot-password-form'-->
<div class="card" id="forgot-password-div">
    <div class="card-header">Reset Password</div>
    <div class="card-body">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <label for="email">E-Mail Address</label>
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div>
                    <button type="submit">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('rightArea')
@include('slider')
@endsection

@section('scripts')

@endsection