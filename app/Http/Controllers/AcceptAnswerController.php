<?php

namespace App\Http\Controllers;

use App\Answer;

class AcceptAnswerController extends Controller
{
    //if no method name on route laravel will call __invoke method
    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
