<?php

namespace App\Traits;

use App\Models\User;

trait VotableTrait
{
    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }
    public function vote($vote = true)
    {
        if ($this->isVoted($vote)) {
            return $this->vote()
                ->where('user_id', auth()->user()->id)
                ->where('vote', $vote)
                ->delete();
        }

        $this->vote()->updateOrCreate(
            [
                'user_id' => auth()->id(),
                'votable_id' => $this->id
            ],
            [ 'vote' => $vote ]
        );
    }

    public function isVoted($vote)
    {
        return (bool) $this->votes()
            ->where('user_id', auth()->user()->id)
            ->where('vote', $vote)
            ->count();
    }
}
