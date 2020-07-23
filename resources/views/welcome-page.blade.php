@extends('layouts.main')

@section('leftArea')
<div id="leftAreaWelcome">
    <!-- Форма входа Sign in -->
    <form method="POST" action="{{ route('login-post') }}" id="sign-in-form">
        @csrf

        <!-- Email div -->
        <div>
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
        <div>
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
        <div>
            <div>
                <div>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
            </div>
        </div>

        <!-- Submit div -->
        <div>
            <div>
                <button type="submit">Login</button>

                <a class="btn btn-link" href="/" onclick="event.preventDefault(); 
                document.getElementById('forgot-password-div').style.display = 'block';
                document.getElementById('sign-in-form').style.display = 'none';
                document.getElementById('sign-up-form').style.display = 'none';">
                    Forgot Your Password?
                </a>
            </div>
        </div>

    </form>

    <!-- Форма регистрации нового пользователя Sign up-->
    <form method="POST" action="{{ route('register-post') }}" id="sign-up-form"> 
        @csrf

        <!-- Name div -->
        <div>
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
        <div>
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
        <div>
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
        <div>
            <label for="password-confirm">Confirm Password</label>

            <div>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <!-- Submit div -->
        <div>
            <div>
                <button type="submit">
                    Register
                </button>
            </div>
        </div>

    </form>

    <!-- Форма запроса ссылки на сброс пароля 'forgot-password-form'-->
    <div id="forgot-password-div">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">E-Mail Address</label>

            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
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

<div id="rightAreaWelcome">
    <!-- Карусель -->
    <h1>Карусель</h1>
</div>

@endsection

@section('scripts')

@endsection