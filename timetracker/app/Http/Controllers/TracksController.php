<?php

namespace App\Http\Controllers;

use App\Track;
use App\Tracker\Tracker;

class TracksController extends Controller
{
    public function index()
    {
        $tracks = Track::all();


        return view('tracks.index', compact('tracks'));
    }


    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));

    }


    public function store()
    {
        $userId = 1;
        $tracker = new Tracker();

        $track = Track::getCurrent($userId);

        $tracker->store($track);

        $track->save();


        return $this->index();
    }

}
