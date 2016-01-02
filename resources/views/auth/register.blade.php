@extends('layouts.main_page')

@section('title')

<title>Ujval - School of Strength</title>

@endsection

@section('login_lock_register')
    <body>
        <!-- @if (count($errors) > 0)
       		<div>
        		<strong>Whoops!</strong> There were some problems with your input.<br><br>
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
	    @endif --> 
	    
	    @include('errors.errors')
	    
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form class="form-horizontal" method="POST" action="/auth/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <div class="col-md-6">
                            <a href="/password/email" class="btn btn-link btn-block">Forgot your password?</a>
                        </div> -->
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="register" type="submit">Sign Up</button>
                        </div>
                        <!-- <input type="checkbox" name="remember"> Remember me -->
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 Ujval
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        
@endsection




