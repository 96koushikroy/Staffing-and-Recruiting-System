@extends('layouts.master')
@section('title')
Showing Applicants for Job ID: {{$lid}}
@stop
@section('head')

@stop
@section('body')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Applied</th>
                    <th>No. of Matched Skills</th>
                    <th>Cover Letter</th>
                    <th>View More</th>
                </tr>
                </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->skill_count}}</td>
                   <td> <a href="#{{$d->aid}}" class="btn btn-lg btn-primary" data-toggle="modal">View Cover Letter</a>

                    <div id="{{$d->aid}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Cover Letter of {{$d->name}}</h4>
                                </div>
                                <div class="modal-body">
                                {!! $d->cover_letter !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div></td>
                    <td><a href="{{URL::to('my-listings/applicants/'.$d->lid.'/'.$d->aid)}}" class="btn btn-primary">View Applicant</a></td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@stop