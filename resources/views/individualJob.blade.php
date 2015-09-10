@extends('layouts.master')
@section('title')
Job Information
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
    @if($data->responsibilities!='')
        <h4>RESPONSIBILITIES</h4>
        {!!$data->responsibilities!!}
        <br/>
    @endif
    @if($data->requirements!='')
        <h4>REQUIREMENT FOR THE APPLICANT</h4>
        {!!$data->requirements!!}
        <br/>
    @endif
    @if($data->benefits!='')
        <h4>BENEFITS OF WORKING WITH US</h4>
        {!!$data->benefits!!}
        <br/>
    @endif
    <br>
    <br>
    @if(!Auth::check())
        <div class="text-center">
        <a href="{{URL::to('job/apply/'.$data->lid)}}" class="btn btn-lg btn-success">Apply Now</a>
        </div>
        <br> <br>
        @endif
</div>
    @endif
@stop