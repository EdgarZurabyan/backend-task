@extends('adminlte::page')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Events</h3>
                </div>
                <div class="box-body">
                    <ul>
                        @foreach ($events as $event)
                            <li>{{ $event->Title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
        </div>
    </div>
@stop
