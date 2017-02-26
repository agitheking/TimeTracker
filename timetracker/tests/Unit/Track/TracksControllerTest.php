<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 26.02.17
 * Time: 22:19
 */

namespace Tests\Unit\Track;


use App\Http\Controllers\TracksController;
use App\Track;
use Tests\TestCase;


class TracksControllerTest extends TestCase
{
    public function testIndex()
    {
        $tracks = $this->call('GET', 'tracks');
        foreach ($tracks as $track) {
            $this->isInstanceOf(Track::class, $track);
        }
    }



}
