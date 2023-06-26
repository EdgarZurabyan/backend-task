@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.register') }}" method="post">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" name="Login" class="form-control" placeholder="Login">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="Password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" name="Name" class="form-control" placeholder="Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" name="Surname" class="form-control" placeholder="Surname">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" name="DateOfBirth" class="form-control" placeholder="Date of Birth (optional)">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ route('admin.login') }}" class="text-center">I already have an account</a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('adminlte_js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
