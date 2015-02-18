<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {

    use SubmittedByTrait;
    use ScopeLatestSubmissionsTrait;

    protected $fillable = array(
        'name',
        'release_date',
        'catalog_number',
        'description'
    );

    protected $dates = array(
        'release_date'
    );

    public function getTotalDurationAttribute()
    {
        $seconds = $this->tracks->sum(function($track){ return $track->duration->getTimestamp(); });
        $duration = \Carbon\Carbon::createFromTimestamp($seconds);
        $duration->setToStringFormat('H:i:s');

        return $duration;
    }

    public function band()
    {
        return $this->belongsTo('App\Band');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function format()
    {
        return $this->belongsTo('App\Format');
    }

    public function label()
    {
        return $this->belongsTo('App\Label');
    }

    public function ownedBy()
    {
        return $this->belongsToMany('App\User');
    }
}
