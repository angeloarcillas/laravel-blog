<?php

namespace App\Policies;

use App\models\Question;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

    public function delete(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }

}
