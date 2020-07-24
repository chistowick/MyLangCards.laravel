@extends('layouts.main')

@section('leftArea')

<div class="card" id="reset-password-div">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row">
                <label for="email">E-Mail Address</label>

                <div>
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

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

            <div class="form-group row">
                <label for="password-confirm">Confirm Password</label>

                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row">
                <div>
                    <button type="submit">
                        Reset Password
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