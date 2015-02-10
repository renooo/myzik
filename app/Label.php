<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
