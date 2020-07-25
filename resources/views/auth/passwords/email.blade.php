@extends('layouts.main')

@section('leftArea')

<div class="row justify-content-center">
    <div class="col-8 col-md" id="forgot-password-div">
        <!-- Форма запроса ссылки на сброс пароля 'forgot-password-form'-->
        <div class="card">
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
                        <label for="email" class="col-xl-4 col-form-label text-xl-right">E-Mail Address</label>
                        <div class="col-xl-8">
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-8 offset-xl-4">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection