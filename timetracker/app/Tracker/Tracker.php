<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 26.02.17
 * Time: 23:33
 */

namespace App\Tracker;


use App\Track;
use DateTime;
use \Exception;

class Tracker
{
    public function start(Track $track, $dateTime = null)
    {
        if (!is_null($track->start)) {
            throw new Exception("Tracker {$track->id} is already active!");
        }

        $dateTime = is_null($dateTime) ? new DateTime() : $dateTime;
        $track->start = $dateTime;
    }


    public function stop(Track $track, DateTime $dateTime = null)
    {
        if (!is_null($track->end)) {
            throw new Exception("Tracker {$track->id} is not active!");
        }

        // Set date
        $dateTime = is_null($dateTime) ? new DateTime() : $dateTime;


        $track->end = $dateTime;
    }

    public function store(Track $track)
    {
        if (!$track->isStarted()){
            $this->start($track);
        } else if ($track->checkActive()) {
            $this->stop($track);
        }


    }

}