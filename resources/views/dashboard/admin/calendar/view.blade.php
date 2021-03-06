@extends('layouts.dashboard')

@section('title')
View News
@endsection

@section('content')
<div class="container">
    @if($calendar->type == 1)
        <h1 class="h3 mb-4 text-gray-800">Viewing News Posting, "{{ $calendar->title }}"</h1>
    @else
        <h1 class="h3 mb-4 text-gray-800">Viewing News Posting, "{{ $calendar->title }}"</h1>
    @endif
</div>
<br>
<div class="container">
    <a href="/dashboard/admin/calendar" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    <br><br>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h3>
                {{ $calendar->title }} <a href="/dashboard/admin/calendar/edit/{{ $calendar->id }}" class="btn btn-success">Edit</a>
            </h3>
        </div>
        <div class="card-body">
            <p><b>Date:</b> {{ $calendar->date }}</p>
            <p><b>Time:</b> @if($calendar->time != null) {{ $calendar->time }} @else No time listed. @endif</p>
            <p><b>Additional Information:</b></p>
            <p>{!! $calendar->body !!}</p>
            <hr>
            <p class="small"><i>Created by {{ App\User::find($calendar->created_by)->full_name }} at {{ $calendar->created_at }}</i></p>
            @if($calendar->updated_by != null)
                <p class="small"><i>Last updated by {{ App\User::find($calendar->updated_by)->full_name }} at {{ $calendar->updated_at }}</i></p>
            @endif
        </div>
</div>
<br><br>
</div>
@endsection
