@extends('umaster')
@section('title', 'Login')
@section('breadcrumb')
<a href="#">Login Page</a>
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="login-form">
      <p class="text-center mb-40">Welcome back! Sign in to your account </p>
      <form method="post" action="{{ url('login') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
          @if($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
          @if($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="genric-btn primary">Login</button>
          </div>
          <div class="col">
            <a href="{{ url('password/reset') }}">Lupa Password?</a>
          </div>
          <div class="col">
            <a href="{{ url('register') }}">Belum punya akun?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


