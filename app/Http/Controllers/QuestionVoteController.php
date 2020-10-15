<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionVoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(Question $question)
    {
        //set vote request to int
        $vote = (int) request()->vote;
        auth()->user()->voteQuestion($question, $vote);
        return back();
    }

}