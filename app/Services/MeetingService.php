<?php

namespace App\Services;

use App\Models\Meeting;

class MeetingService
{
    public function createMeeting(array $data)
    {
        if (!isset($data['creator_id'])) {
            throw new \Exception('creator_id is required to create a meeting');
        }

        return Meeting::create($data);
    }

    public function updateMeeting($id, $data)
    {
        $meeting = Meeting::find($id);
        $meeting->subject = $data['subject'];
        $meeting->date_time = $data['date_time'];

        $meeting->save();

        return $meeting;
    }

    public function deleteMeeting($id)
    {
        $meeting = Meeting::find($id);
        $meeting->delete();
    }
}
