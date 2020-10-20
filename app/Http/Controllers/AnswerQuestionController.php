<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerQuestionController extends Controller
{
    //
    public function __invoke(Request $request, Question $question)
    {
        $attributes = $request->validate([
            'body' => 'required|min:5'
        ]);

        $question->answer->create($attributes);
        return back();
    }
}
