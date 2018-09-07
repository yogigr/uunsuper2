@extends('umaster')
@section('title', 'Register')
@section('breadcrumb')
<a href="#">Register</a>
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="login-form">
      <p class="text-center mb-40">Silahkan isi data dibawah untuk daftar member.</p>
      <form method="post" action="{{ url('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
          @if($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
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
        <div class="form-group">
          <label>Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
          @if($errors->has('password_confirmation'))
            <div class="invalid-feedback">
              {{ $errors->first('password_confirmation') }}
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="genric-btn primary">Register</button>
          </div>
          <div class="col">
            <a href="{{ url('password/reset') }}">Lupa Password?</a>
          </div>
          <div class="col">
            <a href="{{ url('login') }}">Sudah punya akun?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


