@extends('layouts.main_page')

@section('title')

<title>Ujval - School of Strength</title>

@stop

@section('login_lock_register')

<div>
    @if (session('status'))
      <div class="alert alert-success">
             {{ session('status') }}
      </div>
    @endif

 @include('errors.errors')
 
 <div class="registration-container">            
            <div class="registration-box animated fadeInDown">
                <!-- <div class="registration-logo"></div> -->
                <div class="registration-body">
                    <div class="registration-title"><strong>Forgot</strong> Password?</div>
                    <div class="registration-subtitle">Please enter your registered mail id below. </div>
                    <form action="index.html" class="form-horizontal" method="post">                        
                    <h4>Your E-mail</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="email@domain.com"/>
                        </div>
                    </div>                                                            
                    <div class="form-group push-up-20">
                        <!-- <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Registration</a>
                        </div> -->
                        <div class="col-md-6">
                            <a href="/auth/login"><button class="btn btn-danger btn-block">Login</button></a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="registration-footer">
                    <div class="pull-left">
                        &copy; 2016 UJVAL
                    </div>
                    <div class="pull-right">
                        <a href="/">Home</a> |
                  		<a href="/">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>

<!-- <form class="form" role="form" method="POST" action="/password/email">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
<button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</form> -->

@stop

