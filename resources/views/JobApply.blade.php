@extends('layouts.master')
@section('title')
Apply For Job
@stop
@section('head')
    <link rel="stylesheet" href="{{URL::to('/')}}/libraries/css/summernote.css">
    <script src="{{URL::to('/')}}/libraries/js/typeahead.js"></script>
    <script src="{{URL::to('/')}}/libraries/js/summernote.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('body')
    @if(($data->job_end_date) <= date('Y-m-d') || $data->status==0)
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-align">
                    <h2>Job Not Available. Sorry!</h2>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h4>Job Information</h4>
                    <h5>Job Posted On: <strong>{{$data->created_at}}</strong>&nbsp;&nbsp;&nbsp;Job Deadline: <strong>{{$data->job_end_date}}</strong></h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h4><strong>{{$data->position}}</strong></h4>
                    <p>Job Nature: <strong>{{$data->job_type}}</strong>, Pay Type: <strong>{{$data->pay_type}}</strong></p>
                    <p>Pay Range: <strong>{{$data->payment_range}}</strong></p>
                    <p>Job Category: <strong>{{$data->category}}</strong></p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6 text-center">
                    <p>Skills Preferred For the Job: <br>@if($data->skills_1 != '')<strong>{{$data->skills_1}}</strong><br>@endif @if($data->skills_2 != '')<strong>{{$data->skills_2}}</strong>
                        <br>@endif @if($data->skills_3 != '')<strong>{{$data->skills_3}}</strong><br>@endif @if($data->skills_4 != '')<strong>{{$data->skills_4}}</strong><br>@endif @if($data->skills_5 != '')<strong>{{$data->skills_5}}</strong><br>@endif @if($data->skills_6 != '')<strong>{{$data->skills_6}}</strong><br>@endif</p>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h5><u>Enter Information Below To Apply</u></h5>
{!! Form::open(['files'=>'true']) !!}
                    Name:  {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Your Full Name']) !!}
                    <br>
                    Email: {!! Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Your Email Address']) !!}
                    <br>
                    Attaining Skills(Maximum 6 Skills Needed):
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill1" placeholder="Skill 1">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill2" placeholder="Skill 2">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill3" placeholder="Skill 3">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill4" placeholder="Skill 4">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill5" placeholder="Skill 5">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="typeahead form-control" name="skill6" placeholder="Skill 6">
                        </div>
                    </div>
                    <br>
                    Upload Your Resume:
                    {!! Form::file('resume') !!}
                    <br>
                    Cover Letter:
                    <textarea class="form-control" id="cover" name="cover"></textarea>
                    <br>
                    {!! Form::submit('Apply Now',['class'=>'btn btn-primary btn-lg']) !!}
                    <br><br>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    @endif
    <script>
        $(document).ready(function() {
         /*   $('input.typeahead').typeahead({
                name: 'accounts',
                local:
        });*/
            $('#cover').summernote({
                height: 200});

        });
    </script>
@stop