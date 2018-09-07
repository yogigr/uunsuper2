@extends('umaster')
@section('title', 'Lupa Password')
@section('breadcrumb')
<a href="#">Lupa Password</a>
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
      <p class="text-center mb-40">Silahkan isi email yang sudah terdaftar</p>
      <form method="post" action="{{ url('password/email') }}">
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


