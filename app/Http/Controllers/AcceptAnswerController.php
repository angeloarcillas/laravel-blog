<?php

namespace App\Http\Controllers;

use App\Answer;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        $answer->question->best_answer_id;
        $answer->question->save();
        return back();
    }
}
