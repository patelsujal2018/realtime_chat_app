@extends('layouts.auth')

@section('page_title') {{ env('APP_NAME') }} | Login @endsection

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            {{--<h1 class="logo-name">IN+</h1>--}}
        </div>
        <h3>Welcome to {{ env('APP_NAME') }}</h3>
        <p>Login</p>
        @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }}">{ Session::get('message') }</div>
        @endif
        <form method="post" class="m-t" role="form" action="{{ route('auth.login') }}">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.register.page') }}">Create an account</a>
        </form>
    </div>
</div>
@endsection
