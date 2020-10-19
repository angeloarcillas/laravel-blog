<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\AskQuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
        return view('questions.index', [
            'questions' => Question::with('user')->latest()->paginate(5)
        ]);
    }

    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect('/questions')->with('success', "your question has been submitted");
    }

    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        // [ CUSTOM GATE - AUTH]
        // if (\Gate::denies('update-question',$question)) {
        //   abort(403,"Access Denied");
        // }

        $this->authorize('update', $question);
        $question->update($request->only('title', 'body'));
        return redirect('/questions')->with('success', "your question has been submitted");
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();
        return redirect('/questions')->with('success', "your question has been submitted");
    }
}
