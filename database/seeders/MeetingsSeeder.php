<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MeetingsSeeder extends Seeder
{
    public function run()
    {
        $creator_id = 1;

        for ($i = 1; $i <= 50; $i++) {
            Meeting::create([
                'subject' => 'Meeting ' . $i,
                'date_time' => Carbon::now()->addDays($i)->format('Y-m-d H:i:s'),
                'creator_id' => $creator_id,
            ]);
        }
    }
}
