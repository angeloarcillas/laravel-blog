<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerVoteController extends Controller
{
    public function __invoke(Request $request, Answer $answer)
    {
        $answer->vote($request->vote);
        return back();
    }
}
