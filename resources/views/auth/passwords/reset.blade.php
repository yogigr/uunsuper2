@extends('umaster')
@section('title', 'Reset Password')
@section('breadcrumb')
<a href="#">Reset Password</a>
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="login-form">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <p class="text-center mb-40">Silahkan isi data dibawah untuk mereset password anda.</p>
      <form method="post" action="{{ url('password/reset') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{  $token}}">
        <div class="form-group">
          <label>Email</label>
          <input name="email" type="text" value="{{ old('email') }}" 
          class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" autofocus>
          @if($errors->has('email'))
          <div class="invalid-feedback">
            {{ $errors->first('email') }}
          </div>
          @endif
        </div>
        <div class="form-group">
          <label>Password Baru</label>
          <input name="password" type="password" 
          class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
          @if($errors->has('password'))
          <div class="invalid-feedback">
            {{ $errors->first('password') }}
          </div>
          @endif
        </div>
        <div class="form-group">
          <label>Konfirmasi Password Baru</label>
          <input name="password_confirmation" type="password" class="form-control">
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="genric-btn primary">Kirim email</button>
          </div>
          <div class="col">
            <a href="{{ url('login') }}">Sudah punya akun?</a>
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


