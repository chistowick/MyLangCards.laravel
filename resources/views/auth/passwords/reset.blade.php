@extends('layouts.main')

@section('leftArea')

<div class="row justify-content-center">
    <div class="col-8 col-md" id="reset-password-div">
    <!-- Форма сброса пароля password/reset/{token} -->
        <div class="card">
            <div class="card-header">Reset Password</div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row">
                        <label for="email" class="col-xl-5 col-form-label text-xl-right">E-Mail Address</label>

                        <div class="col-xl-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

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

                    <div class="form-group row">
                        <label for="password-confirm" class="col-xl-5 col-form-label text-xl-right">Confirm Password</label>

                        <div class="col-xl-7">
                            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-7 offset-xl-5">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection