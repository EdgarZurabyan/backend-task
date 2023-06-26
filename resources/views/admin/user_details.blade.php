@extends('adminlte::page')

@section('content_header')
    <h1>User Details</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">User Information</h3>
        </div>
        <div class="box-body">
            <p>Name: {{ $user->Name }}</p>
            <p>Surname: {{ $user->Surname }}</p>
            <p>Date of Birth: {{ $user->DateOfBirth }}</p>
        </div>
    </div>
@stop
