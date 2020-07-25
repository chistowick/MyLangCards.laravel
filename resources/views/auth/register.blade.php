@extends('layouts.main')

@section('leftArea')

<div class="row justify-content-center">
    <div class="col-8 col-md" id="sign-up-div">
        <!-- Форма регистрации нового пользователя Sign up-->
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register-post') }}">
                    @csrf

                    <!-- Name div -->
                    <div class="form-group row">
                        <label for="name" class="col-xl-5 col-form-label text-xl-right">Name</label>
                        <div class="col-xl-7">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email div -->
                    <div class="form-group row">
                        <label for="email" class="col-xl-5 col-form-label text-xl-right">E-Mail Address</label>
                        <div class="col-xl-7">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password div -->
                    <div class="form-group row">
                        <label for="password" class="col-xl-5 col-form-label text-xl-right">Password</label>
                        <div class="col-xl-7">
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password confirmation div -->
                    <div class="form-group row">
                        <label for="password-confirm" class="col-xl-5 col-form-label text-xl-right">Confirm Password</label>

                        <div class="col-xl-7">
                            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Submit div -->
                    <div class="form-group row">
                        <div class="col-xl-7 offset-xl-5">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection