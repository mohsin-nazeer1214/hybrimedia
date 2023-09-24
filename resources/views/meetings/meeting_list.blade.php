@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div class="container">
        <h1>Meetings</h1>

        <a href="{{ route('meetings.create') }}" class="btn btn-success mb-3">Add Meeting</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Date Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->subject }}</td>
                        <td>{{ $meeting->date_time }}</td>
                        <td>
                            <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $meeting->id }})">Delete</button>
                            <form id="delete-form-{{ $meeting->id }}" action="{{ route('meetings.destroy', $meeting->id) }}"
                                method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="custom-pagination">
            @if ($meetings->currentPage() > 1)
                <a href="{{ $meetings->previousPageUrl() }}">Previous</a>
            @endif

            @for ($i = 1; $i <= $meetings->lastPage(); $i++)
                <a href="{{ $meetings->url($i) }}"
                    class="{{ $meetings->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            @if ($meetings->hasMorePages())
                <a href="{{ $meetings->nextPageUrl() }}">Next</a>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(meetingId) {
            if (confirm("Are you sure you want to delete this meeting?")) {
                document.getElementById('delete-form-' + meetingId).submit();
            }
        }
    </script>
@endsection
