<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    protected $fillable = array(
        'name'
    );

    public function bands()
    {
        return $this->belongsToMany('App\Band');
    }
}
