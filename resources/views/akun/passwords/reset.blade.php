@extends('dashboard.layout2') @section('judul', 'Halaman Reset
Password') @section('konten2')
<div class="login-logo">
    <a href="/">
        <b>WPP</b>7</a>
</div>
<!-- /.login-logo -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="text-center" action="#" method="post">
        @csrf
        <h3 class="h5 mb-3 fw-normal">Pulihkan password anda</h3>
        <div class="input-group mb-3">
            <input readonly
                id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Email"
                name="email"
                value="{{ $email ?? old('email') }}"
                required="required"
                autocomplete="email"
                autofocus="autofocus">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input
                id="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                required="required"
                autocomplete="new-password"
                placeholder="{{ __('Password Baru') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input
            id="password-confirm"
            type="password"
            class="form-control"
            name="password_confirmation"
            required="required"
            autocomplete="new-password"
                placeholder="{{ __('Ketik ulang kata sandi') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
            </div>
            <!-- /.col -->
        </div>
        <p class="mt-3 mb-1">
            Password sudah terubah?
        <a href="{{ route('login') }}">Login</a>
    </p>
    </form>
</div>
@endsection
