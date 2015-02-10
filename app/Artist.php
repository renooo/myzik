<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

    public function bands()
    {
        return $this->belongsToMany('App\Band');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
