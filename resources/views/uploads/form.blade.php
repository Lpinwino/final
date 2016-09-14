@extends('master')
 
@section('title', 'Uploading files with laravel 5')
 
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Uploading files with laravel 5</div>
 
                @if (Session::has('success-message'))
                    <div class="alert alert-success">{{ Session::get('success-message') }}</div>
                @endif
 
                @if (Session::has('error-message'))
                    <div class="alert alert-danger">{{ Session::get('error-message') }}</div>
                @endif
 
                <div class="panel-body">
                    {!! Form::open(array('url' => 'uploads/save', 'method' => 'post', 'files' => true)) !!}
 
                        <div class="form-group">
                            {!! Form::label('file', 'File') !!}
                            <span class="btn btn-default btn-file">
                               Select a file {!! Form::file('file') !!}
                            </span>
                        </div>
 
                        <div class="form-group">
                            {!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
                        </div>
 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection