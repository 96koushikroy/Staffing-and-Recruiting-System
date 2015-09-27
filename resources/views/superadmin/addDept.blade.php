@extends('layouts.master')
@section('title')
    Add, Delete Departments
@stop

@section('body')
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Add Departments</h3>
            @if(Session::get('data'))
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('data')}}</strong>
                </div>
            @endif
            <hr>
            {!! Form::open() !!}
            Department Name:
            {!! Form::text('jtype','',['class'=>'form-control','placeholder'=>'Department Name']) !!}
            <br>
            {!! Form::submit('Add Department',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            <br>
            <h3>Added Departments</h3>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Departments</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{$d->d_name}}</td>
                        <td><a href="{{URL::to('add-department/delete/'.$d->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop