<?php

namespace App\Traits;

use App\User;

trait VotableTrait
{
    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
    public function upVotes()
    {
        return $this->votes()->wherePivot('vote', 1)->get();
    }
    public function downVotes()
    {
        return $this->votes()->wherePivot('vote', -1)->get();
    }
}
