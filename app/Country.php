<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    public $timestamps = false;

    public function bands()
    {
        return $this->hasMany('App\Band');
    }

    public function artists()
    {
        return $this->hasMany('App\Artist');
    }
}
