@extends('layouts.master')
@section('title')
Add Listing
@stop
@section('head')
    <link rel="stylesheet" href="{{URL::to('/')}}/libraries/css/summernote.css">
    <script src="{{URL::to('/')}}/libraries/js/typeahead.js"></script>
    <script src="{{URL::to('/')}}/libraries/js/summernote.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
@stop
@section('body')
<div class="row text-center">
    <div class="col-md-3"></div>
    <div class="col-md-6">
<h3>Add Listing</h3>
        @if(Session::get('data'))
            <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{Session::get('data')}}</strong>
            </div>
        @endif
        <hr>
        {!! Form::open() !!}
        Position: {!! Form::text('position','',['class'=>'form-control','placeholder'=>'Enter Job Opening Position Name']) !!}
        <br>
        Job Category:
        {!! Form::select('category',$category,'',['class'=>'form-control']) !!}
        <br>

        <div class="row">
            <div class="col-md-6">
                Job Type:
                {!! Form::select('jobt',$jobt,'',['class'=>'form-control']) !!}
            </div>
            <div class="col-md-6">
                Pay Type:
                {!! Form::select('payt',$payt,'',['class'=>'form-control']) !!}
            </div>
        </div>
        <br>
        Pay Range:
        <div class="row">
            <div class="col-md-6">
                From:
                {!! Form::text('pr1','',['class'=>'form-control','placeholder'=>'Minimum Salary for the Position']) !!}
            </div>
            <div class="col-md-6">
                To:
                {!! Form::text('pr2','',['class'=>'form-control','placeholder'=>'Maximum Salary for the Position']) !!}
            </div>
        </div>
        <br>
        Required Skills(Maximum 6 Skills Needed):
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
        Job Requirements:
        {!! Form::textarea('req','',['id'=>'req']) !!}
        <br>
        Job Responsibilities:
        {!! Form::textarea('respo','',['id'=>'respo']) !!}
        <br>
        Job Benefits:
        {!! Form::textarea('bene','',['id'=>'bene']) !!}
        <br>
Make This Listing Viewable From Today Till:
        <input type="date" name="till">
        <br><br>
        {!! Form::submit('publish listing',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <br><br>
    </div>
    <div class="col-md-3"></div>
</div>

<script>
    $(document).ready(function() {
        $('input.typeahead').typeahead({
            name: 'accounts',
            local: {!! $skills !!}
        });
        $('#req').summernote({
            height: 200});
        $('#respo').summernote({
            height: 200});
        $('#bene').summernote({
            height: 200
        });
    });
</script>
@stop