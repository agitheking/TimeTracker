<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 26.02.17
 * Time: 23:37
 */


use App\Tracker\Tracker;
use Tests\TestCase;


class TrackerTest extends TestCase
{

    public function testStop_TrackerIsActive_stopTracker()
    {
        $track = new \App\Track();

        $tracker = new Tracker();
        $tracker->stop($track);


        $this->assertInstanceOf(DateTime::class, $track->end);

    }


    public function testStop_TrackerIsStopedAtRightTime()
    {
        $track = new \App\Track();

        $tracker = new Tracker();
        $dateTime = new DateTime();

        $tracker->stop($track, $dateTime);


        $this->assertEquals($dateTime , $track->end);

    }

    /**
     * @expectedException \Exception
     */
    public function testStop_TrackerIsNotStoped_Exception()
    {
        $track = new \App\Track();
        $track->end = 1;

        $tracker = new Tracker();
        $tracker->stop($track);

    }


    public function testStart_NewTrack_SetStart()
    {
        $track = new \App\Track();

        $tracker = new Tracker();
        $tracker->start($track);


        $this->isNull($track->end);
        $this->assertInstanceOf(DateTime::class, $track->start);
    }

    /**
     * @expectedException \Exception
     */
    public function testStart_ExistingTrack_Exception()
    {

        $track = new \App\Track();
        $track->start = 1;

        $tracker = new Tracker();
        $tracker->start($track);

    }


    public function testStore_ActiveTrack_StopTrack()
    {
        $track = new \App\Track();
        $track->start = 1;

        $tracker = new Tracker();
        $tracker->store($track);

        $this->assertNotNull($track->end);

    }


    public function testStore_NotActiveTracker_CreateTracker()
    {
        $track = new \App\Track();

        $tracker = new Tracker();
        $tracker->store($track);

        $this->assertNull($track->end);
    }
}
