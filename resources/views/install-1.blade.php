@extends('layouts.master')
@section('title')
Soft Staffing and Recruitment Software | Installation
@stop

@section('body')
<div class="container">
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Soft Staffing and Recruitment Software | Installation</h3>
            @if(Session::get('data'))
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('data')}}</strong>
                </div>
            @endif
            <hr>
            <h4>Complete Company Profile</h4>
            <br>
{!! Form::open(['url'=>'savebasic','files'=>true]) !!}
            Name:
            {!! Form::text('name','',['placeholder'=>'Enter Company Name','class'=>'form-control']) !!}
            <br>
            Upload Company Logo: <br>
            <input type="file" name="image1" class="form-control">
            <br>
            About the Company(Required During Job Listing):<br>
            {!! Form::textarea('about','',['class'=>'form-control','placeholder'=>'Enter Something About The Company']) !!}

            <br>
            {!! Form::submit('Proceed',['class'=>'btn btn-primary']) !!}<br><br>
            {!! Form::close() !!}
        </div>
        <div class="col-md-3"></div>
    </div>
</div>f
@stop