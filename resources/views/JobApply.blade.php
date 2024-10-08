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
                    @if(Session::get('data'))
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{Session::get('data')}}</strong>
                        </div>
                    @endif
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
                    <p>Application Checking ID: <strong>{{$appid}}</strong>. Save it to check your application status.</p>
                    {!! Form::hidden('aid',$appid) !!}
                    Name:  {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Your Full Name']) !!}
                    <br>
                    Email: {!! Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Your Email Address']) !!}
                    <br>
                    Attaining Skills(Maximum 6 Skills Needed):
                    <div class="row">
                        <div class="col-md-2">
                            @if($data->skills_1 != '')<strong>{{$data->skills_1}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill1" value="{{$data->skills_1}}" >
                                @endif
                        </div>
                        <div class="col-md-2">
                            @if($data->skills_2 != '')<strong>{{$data->skills_2}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill2" value="{{$data->skills_2}}">
                                @endif
                        </div>
                        <div class="col-md-2">
                            @if($data->skills_3 != '')<strong>{{$data->skills_3}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill3" value="{{$data->skills_3}}">
                                @endif
                        </div>
                        <div class="col-md-2">
                            @if($data->skills_4 != '')<strong>{{$data->skills_4}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill4" value="{{$data->skills_4}}">
                                @endif
                        </div>
                        <div class="col-md-2">
                            @if($data->skills_5 != '')<strong>{{$data->skills_5}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill5" value="{{$data->skills_5}}">
                                @endif
                        </div>
                        <div class="col-md-2">
                            @if($data->skills_6 != '')<strong>{{$data->skills_6}}</strong><br>
                            <input type="checkbox" class="form-control" name="skill6" value="{{$data->skills_6}}">
                                @endif
                        </div>
                    </div>
                    <input type="hidden" id="texens" name="scount" value="0" />
                    <br>
                    Upload Your Resume:
                    {!! Form::file('image1') !!}
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
            var count = 0;
            $(':checkbox').change(function() {
                count  = document.querySelectorAll('input[type="checkbox"]:checked').length - 1;
                $("#texens").val(count);
            });

            $('#cover').summernote({
                height: 200});

        });
    </script>
@stop