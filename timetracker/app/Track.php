<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Track extends Model
{

    protected $dates = [
        'end' ,
        'start',
    ];

    /**
     * Return true if current Track is active
     */
    public static function getCurrent($userId)
    {
        try {
            $current = Track::where('userId', $userId)->where('end', null)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $current = Track::create($userId);
        }

        return $current;
    }

    /**
     * @return bool
     */
    public function checkActive()
    {
        return is_null($this->end) ? true : false;

    }

    public function isStarted()
    {
        return !is_null($this->start) ? true : false;
    }


    public static function create($userId)
    {
        $track = new Track();
        $track->userid = $userId;
        $track->save();


        return $track;
    }


}
