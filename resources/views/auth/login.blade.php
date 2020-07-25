@extends('layouts.main')

@section('leftArea')

<div class="row justify-content-center">
    <div class="col-8 col-md" id="sign-in-div">
        <!-- Форма входа Sign in -->
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login-post') }}">
                    @csrf

                    <!-- Email div -->
                    <div class="form-group row">
                        <label for="email" class="col-xl-4 col-form-label text-xl-right">E-Mail Address</label>
                        <div class="col-xl-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password div -->
                    <div class="form-group row">
                        <label for="password" class="col-xl-4 col-form-label text-xl-right">Password</label>
                        <div class="col-xl-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Checkbox div -->
                    <div class="form-group row">
                        <div class="col-xl-8 offset-xl-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit div -->
                    <div class="form-group row">
                        <div class="col-xl-8 offset-xl-4">
                            <button type="submit" class="btn btn-primary">Login</button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection