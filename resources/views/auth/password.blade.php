@extends('layouts.main_page')

@section('title')

<title>Ujval - School of Strength</title>

@stop

@section('login_lock_register')

<h1>Reset Password</h1>
<div>
    @if (session('status'))
      <div class="alert alert-success">
             {{ session('status') }}
      </div>
    @endif

 @include('errors.errors')

<form class="form" role="form" method="POST" action="/password/email">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
<button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</form>

@stop

