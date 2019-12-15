@extends('layouts.dashboard')

@section('title')
Upload File
@endsection

@section('content')
<div class="container">
	<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="h3 mb-0 font-weight-bold text-gray-600">Edit File</div>
                    </div>
                  </div>
                </div>
</div>
<br>
<div class="container">
    {!! Form::open(['action' => ['AdminDash@saveFile', $file->id]]) !!}
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', $file->name, ['class' => 'form-control', 'placeholder' => 'Required']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('type', 'Type:') !!}
                    {!! Form::select('type', [
                        0 => 'VRC',
                        1 => 'vSTARS',
                        2 => 'vERAM',
                        3 => 'vATIS',
                        4 => 'SOPs/LOAs',
                        5 => 'Misc',
                        6 => 'Staff'
                    ], $file->type, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('desc', 'Description:') !!}
            {!! Form::textArea('desc', $file->desc, ['class' => 'form-control', 'placeholder' => 'Optional']) !!}
        </div>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" action="submit">Save</button>
            </div>
            <div class="col-sm-1">
                <a class="btn btn-danger" href="/dashboard/controllers/files">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
	<br>
</div>
@endsection
