@extends('layouts.master')
@section('title')
Job Listings
@stop

@section('body')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h3>Posted Job Listings</h3>
                @if(Session::get('data'))
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{Session::get('data')}}</strong>
                    </div>
                @endif
                <hr>
                <br>
                @foreach($data as $d)
                <div class="row">
                    <div class="col-md-5">
                        <h5>Position: <strong>{{$d->position}}</strong></h5>
                        <p>Job Nature: <strong>{{$d->job_type}}</strong>, Job Category: <strong>{{$d->category}}</strong></p>
                        <p>Pay&nbsp;Range:&nbsp;<strong>{{$d->payment_range}}</strong>&nbsp;&nbsp;&nbsp;Pay&nbsp;Type:&nbsp;<strong>{{$d->pay_type}}</strong></p>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <a href="{{URL::to('job/'.$d->lid)}}" target="_blank" class="btn btn-primary">View Job</a>&nbsp;&nbsp;
                        <a href="{{URL::to('my-listings/applicants/'.$d->lid)}}" class="btn btn-primary">View Applicants</a>&nbsp;&nbsp;
                        <a href="" class="btn btn-primary">Edit Job</a>&nbsp;&nbsp;
                        <a href="{{URL::to('job/delete/'.$d->lid)}}" class="btn btn-danger">Delete Job</a>&nbsp;&nbsp;
                        @if($d->status == 1)
                        <a href="{{URL::to('job/deactivate/'.$d->lid)}}" class="btn btn-danger">De-Activate</a>
                            @else
                            <a href="{{URL::to('job/activate/'.$d->lid)}}" class="btn btn-success">Activate</a>
                            @endif
                    </div>
                </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@stop


