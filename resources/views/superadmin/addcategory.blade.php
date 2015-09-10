@extends('layouts.master')
@section('title')
Add, Delete Job Category
@stop

@section('body')
<div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>Add Category</h3>
        @if(Session::get('data'))
            <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{Session::get('data')}}</strong>
            </div>
        @endif
        <hr>
        {!! Form::open() !!}
        Category Name:
        {!! Form::text('category','',['class'=>'form-control','placeholder'=>'Category Name']) !!}
        <br>
        {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <br>
        <h3>Added Categories</h3>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Delete Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                <td>{{$d->category}}</td>
                    <td><a href="{{URL::to('add-job-category/delete/'.$d->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3"></div>
</div>
@stop