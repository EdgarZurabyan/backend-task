@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="post">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" name="Login" class="form-control" placeholder="Login">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="Password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ route('admin.register') }}" class="text-center">Register a new membership</a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('adminlte_js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
