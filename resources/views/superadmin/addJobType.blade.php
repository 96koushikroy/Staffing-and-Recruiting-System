@extends('layouts.master')
@section('title')
Add, Delete Job Types
@stop

@section('body')
<div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>Add Job Type</h3>
        @if(Session::get('data'))
            <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{Session::get('data')}}</strong>
            </div>
        @endif
        <hr>
        {!! Form::open() !!}
        Category Name:
        {!! Form::text('jtype','',['class'=>'form-control','placeholder'=>'Job Type Name']) !!}
        <br>
        {!! Form::submit('Add Job Type',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <br>
        <h3>Added Job Types</h3>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Job Types</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                <td>{{$d->type}}</td>
                    <td><a href="{{URL::to('add-job-type/delete/'.$d->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>
@stop