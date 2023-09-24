<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;

class GoogleCalendarService
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
    }

    public function getEvents()
    {
    }
}
