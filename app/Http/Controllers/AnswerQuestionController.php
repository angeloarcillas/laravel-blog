<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AnswerQuestionController extends Controller
{
    //
    public function __invoke(Request $request, Question $question)
    {
        $attributes = $request->validate([
            'body' => 'required|min:5'
        ]);
        $attributes['user_id'] = $request->user()->id;
        $question->answers()->create($attributes);
        return back();
    }
}
