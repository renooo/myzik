<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {

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
}
