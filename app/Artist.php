<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

    use SubmittedByTrait;

    protected $fillable = array(
        'name',
        'real_name',
        'birthdate',
        'biography'
    );

    protected $dates = array(
        'active_from',
        'active_to'
    );

    public function bands()
    {
        return $this->belongsToMany('App\Band');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
