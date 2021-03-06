<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {

    protected $fillable = array(
        'number',
        'name',
        'duration'
    );

    public function record()
    {
        return $this->belongsTo('App\Record');
    }

    public function getDurationAttribute($seconds)
    {
        $duration = \Carbon\Carbon::createFromTimestamp($seconds);
        $duration->setToStringFormat('H:i:s');

        return $duration;
    }
}
