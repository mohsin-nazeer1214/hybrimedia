@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Meeting</h1>

        <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ $meeting->subject }}">
            </div>

            <div class="form-group">
                <label for="date_time">Date Time:</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time"
                    value="{{ \Carbon\Carbon::parse($meeting->date_time)->format('Y-m-d\TH:i') }}">


            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
