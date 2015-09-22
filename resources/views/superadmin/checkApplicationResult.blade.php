@extends('layouts.master')
@section('title')
Applicaiton Status
@stop
@section('head')
    <link rel="stylesheet" href="{{URL::to('/')}}/libraries/css/summernote.css">
    <script src="{{URL::to('/')}}/libraries/js/summernote.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('body')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4>Application of {{$d->name}}</h4>
                @if(Session::get('data'))
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{Session::get('data')}}</strong>
                    </div>
                @endif
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
                <h4>Resume: <a href="{{URL::to('/')}}/{{$d->resume_link}}" class="btn btn-success" target="_blank">View Resume</a></h4>
                <p>Skills For the Job: <br>@if($d->skills_1 != '')<strong>{{$d->skills_1}}</strong><br>@endif @if($d->skills_2 != '')<strong>{{$d->skills_2}}</strong>
                    <br>@endif @if($d->skills_3 != '')<strong>{{$d->skills_3}}</strong><br>@endif @if($d->skills_4 != '')<strong>{{$d->skills_4}}</strong><br>@endif @if($d->skills_5 != '')<strong>{{$d->skills_5}}</strong><br>@endif @if($d->skills_6 != '')<strong>{{$d->skills_6}}</strong><br>@endif</p>
<h4>Cover Letter:</h4>
                <p>{!! $d->cover_letter !!}</p>
                <br>
                <hr>
                <a href="{{URL::to('my-listings/applicants/shortlist/'.$d->aid.'/'.$d->lid)}}" class="btn btn-primary btn-lg">Short-list The Applicant</a>&nbsp;&nbsp;
                <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Email The Applicant</a>
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Email The Applicant: {{$d->email}}</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['url'=>'send-email-to-applicant']) !!}
                                {!! Form::hidden('email',$d->email) !!}
                                Subject:
                                {!! Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject of The Email']) !!}
                                Body:
                                <textarea class="form-control" id="cover" name="cover" placeholder="Email Body"></textarea>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {!! Form::submit('Send Email',['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <br>
    </div>
    <script>
        $(document).ready(function() {
            $('#cover').summernote({
                height: 200});

        });
    </script>
@stop