<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

    use SubmittedByTrait;

    protected $fillable = array(
        'name'
    );

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
