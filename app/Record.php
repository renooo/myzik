<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model {

    use SubmittedByTrait;

    protected $fillable = array(
        'name',
        'release_date',
        'catalog_number',
        'description'
    );

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

    public function ownedBy()
    {
        return $this->belongsToMany('App\User');
    }
}
