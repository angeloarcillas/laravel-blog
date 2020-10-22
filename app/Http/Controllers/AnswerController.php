<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function store(Question $question, Request $request)
    {
        //validate body < + > - add id to array
        $question->answers()->create(
            $request->validate(['body' => 'required'])
             + ['user_id' => \Auth::id()]);
        // back with success => message
        return back()->with('success', 'Your answer has been submitted succesfully');
    }

    public function edit(Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $this->authorize('update', $answer);
        $answer->update($request->validate([
            'body' => 'required',
        ]));
        return redirect()->route('questions.show', $answer->question->id)
            ->with('success', 'Your answer has been updated');
    }

    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return back()->with('success', 'Your answer has been removed');
    }
}
