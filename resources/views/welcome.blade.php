@extends('layouts.master')
@section('title')
    Login
@stop
@section('body')
<div class="container">
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
<h2>{{$data->name}}</h2>
            <h4>Staffing & Recruiting Online Software</h4>
            @if($data->logo != '')
                <img src="{{URL::to('/'.$data->logo)}}" style="display:block; margin:auto;" height="200" width="200" alt="" class="img-responsive">
                <br>
            @endif
            @if(Session::get('data'))
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('data')}}</strong>
                </div>
            @endif
            <hr>
            <h5><strong>Enter Login Credentials Below.</strong></h5>
            {!! Form::open() !!}
            email Address:
            {!! Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Your Email Address']) !!}
            <br>
            Password:
            {!! Form::password('pass',['class'=>'form-control','placeholder'=>'***********']) !!}
            <br>
            {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@stop