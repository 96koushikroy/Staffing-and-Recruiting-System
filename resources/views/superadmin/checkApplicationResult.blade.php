@extends('layouts.master')
@section('title')
Applicaiton Status
@stop

@section('body')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4>Application of {{$d->name}}</h4>
                <hr>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4>Your Application ID is: {{$d->aid}}</h4>
                <h4>Job Application Link: <a href="{{URL::to('job/'.$d->lid)}}">{{URL::to('job/'.$d->lid)}}</a></h4>
                <hr>
                <h3>My Details</h3>
                <h4>Name: {{$d->name}}</h4>
                <h4>Email: {{$d->email}}</h4>
                <h4>Resume: <a href="{{URL::to('/')}}/{{$d->resume_link}}" class="btn btn-success" target="_blank">View My Resume</a></h4>
                <p>Skills For the Job: <br>@if($d->skills_1 != '')<strong>{{$d->skills_1}}</strong><br>@endif @if($d->skills_2 != '')<strong>{{$d->skills_2}}</strong>
                    <br>@endif @if($d->skills_3 != '')<strong>{{$d->skills_3}}</strong><br>@endif @if($d->skills_4 != '')<strong>{{$d->skills_4}}</strong><br>@endif @if($d->skills_5 != '')<strong>{{$d->skills_5}}</strong><br>@endif @if($d->skills_6 != '')<strong>{{$d->skills_6}}</strong><br>@endif</p>
<h4>Cover Letter:</h4>
                <p>{!! $d->cover_letter !!}</p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@stop