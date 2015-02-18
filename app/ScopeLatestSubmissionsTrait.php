<?php namespace App;

Trait ScopeLatestSubmissionsTrait
{
    function scopeLatestSubmissions($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'DESC')->take($limit);
    }
}
