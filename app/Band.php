<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model {

    use SubmittedByTrait;

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
