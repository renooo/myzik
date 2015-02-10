<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

    protected $fillable = array(
        'name',
        'real_name',
        'birthdate',
        'biography'
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
