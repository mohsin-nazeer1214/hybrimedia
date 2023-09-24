<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Models\Meeting;
use App\Services\MeetingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Services\GoogleCalendarService;

class MeetingController extends Controller
{

    protected $meetingService;

    public function __construct(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }


    public function index()
    {
        $meetings = Meeting::paginate(10);
        return view('meetings.meeting_list', compact('meetings'));
    }
    public function show()
    {
        $googleCalendar = new GoogleCalendarService();
        $events = $googleCalendar->getEvents();

        return view('meetings.show_calendar', compact('events'));
    }
    public function create()
    {

        return view('meetings.meeting_form');
    }

    public function store(MeetingRequest $request)
    {
        $data = $request->validated();

        $data['creator_id'] = Auth::id();

        $meeting = $this->meetingService->createMeeting($data);

        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully');
    }

    public function update(MeetingRequest $request, $id)
    {
        $meeting = $this->meetingService->updateMeeting($id, $request->validated());

        return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully');
    }

    public function destroy($id)
    {
        $this->meetingService->deleteMeeting($id);

        return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully');
    }
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);

        return view('meetings.edit', compact('meeting'));
    }
}
