@extends('layouts.master')
@section('title')
    {{$company_name}} | Installation
@stop

@section('body')
<div class="container">
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>{{$company_name}} | Installation</h3>
            @if(Session::get('data'))
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('data')}}</strong>
                </div>
            @endif
            <hr>
            <h4>Complete Administrator Profile</h4>
            <br>
{!! Form::open(['url'=>'createadmin']) !!}
            Name:
            {!! Form::text('name','',['placeholder'=>'Enter Administrator Name','class'=>'form-control']) !!}
            <br>
            Email:
            {!! Form::text('email','',['placeholder'=>'Enter Administrator Email','class'=>'form-control']) !!}
            <br>
            Password:
            {!! Form::password('pass',['placeholder'=>'***','class'=>'form-control']) !!}
            <br>

            {!! Form::submit('Save & Proceed',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@stop