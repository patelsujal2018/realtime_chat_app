@extends('layouts.auth')

@section('page_title') {{ env('APP_NAME') }} | Registration @endsection

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                {{--<h1 class="logo-name">IN+</h1>--}}
            </div>
            <h3>Welcome to {{ env('APP_NAME') }}</h3>
            <p>Registration</p>
            @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
            @endif
            <form method="post" class="m-t" role="form" action="{{ route('auth.register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" />
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile No" />
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation Password" />
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>

                <p class="text-muted text-center"><small>Already have an account</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.login.page') }}">Back to Login</a>
            </form>
        </div>
    </div>
@endsection
