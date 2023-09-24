@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Meeting</h1>

        <form action="{{ route('meetings.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="date_time">Date Time</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
