<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function getEvents(Request $request)
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function action(Request $request)
    {
        $type = $request->input('type');

        if ($type == 'add') {
            $event = new Event;
            $event->title = $request->input('title');
            $event->start = $request->input('start');
            $event->end = $request->input('end');
            $event->save();

            return response()->json(['message' => 'Meeting created successfully']);
        } elseif ($type == 'update') {
            $id = $request->input('id');
            $event = Event::find($id);

            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }

            $event->title = $request->input('title');
            $event->start = $request->input('start');
            $event->end = $request->input('end');
            $event->save();

            return response()->json(['message' => 'Meeting updated successfully']);
        } elseif ($type == 'delete') {
            $id = $request->input('id');
            $event = Event::find($id);

            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }

            $event->delete();

            return response()->json(['message' => 'Meeting deleted successfully']);
        } else {
            return response()->json(['error' => 'Invalid action type'], 400);
        }
    }
}
