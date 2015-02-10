<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    public function bands()
    {
        return $this->belongsToMany('App\Band');
    }
}
