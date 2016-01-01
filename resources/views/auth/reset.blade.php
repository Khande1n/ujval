@extends('layouts.master')

@section('content')

 <h1>Reset Password</h1>

 @if (count($errors) > 0)
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
        @endforeach
         </ul>
        </div>
@endif

<form class="form" role="form" method="POST" action="/password/reset">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="token" value="{{ $token }}">
<input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
<input type="password" name="password" placeholder="Password">
<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
<button type="submit" class="btn btn-primary">Reset Password</button>
</form>

@stop
