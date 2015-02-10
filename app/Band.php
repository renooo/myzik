<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model {

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
