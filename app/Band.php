<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model {

    use SubmittedByTrait;
    use ScopeLatestSubmissionsTrait;

    protected $fillable = array(
        'name',
        'active',
        'active_from',
        'active_to',
        'biography',
        'country_id'
    );

    protected $dates = array(
        'active_from',
        'active_to'
    );

    public function getActiveFromAttribute($date)
    {
        return substr($date, 0, 10);
    }

    public function getActiveToAttribute($date)
    {
        return substr($date, 0, 10);
    }

    public function getGenreListAttribute()
    {
        return $this->genres->lists('id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function artists()
    {
        return $this->belongsToMany('App\Artist');
    }

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
