<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 26.02.17
 * Time: 21:28
 */

namespace Tests\Unit\Track;

use Tests\TestCase;
use App\Track;


class TrackTest extends TestCase
{
    public function testCheckActive_IsActive_True()
    {


        $track = new Track();
        $track->end = null;

        $this->assertTrue($track->checkActive());

    }

    public function testCheckActive_IsNotActive_False()
    {

        $track = new Track();
        $track->end = 1;


        $this->assertFalse($track->checkActive());

    }




    public function testGetCurrent_CallTwice_GetSame()
    {


        $track1 = Track::getCurrent(1);
        $track2 = Track::getCurrent(1);


        $this->assertSame($track1->id, $track2->id);
    }


    public function testGetCurrent_CallTwiceSetEnd_GetNext()
    {

        $track1 = Track::getCurrent(1);
        $track1->end = 1;
        $track1->save();

        $track2 = Track::getCurrent(1);


        $this->assertNotSame($track1->id, $track2->id);
    }



}
