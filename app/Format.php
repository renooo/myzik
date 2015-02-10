<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model {

    public function records()
    {
        return $this->hasMany('App\Record');
    }

}
