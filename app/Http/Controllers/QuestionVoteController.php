<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionVoteController extends Controller
{
    public function __invoke(Request $request, Question $question)
    {
        $question->vote($request->vote);
        return back();
    }

}
