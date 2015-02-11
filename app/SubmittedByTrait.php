<?php namespace App;

Trait SubmittedByTrait
{
    function submittedBy()
    {
        return $this->belongsTo('App\User');
    }
}
