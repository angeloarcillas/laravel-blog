<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Answer $answer)
    {
        return $user->id == $answer->user_id;
    }

    public function accept(User $user, Answer $answer)
    {
        return $user->id == $answer->question->user_id;
    }

    public function delete(User $user, Answer $answer)
    {
        return $user->id == $answer->user_id;
    }
}
