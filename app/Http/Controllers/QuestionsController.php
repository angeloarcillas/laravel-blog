<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;

class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // show all question orderBy latest then paginate
        $questions = Question::with('user')->latest()->paginate(5);
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        $question = new Question();
        return view('question.create', compact('question'));
    }

    public function store(AskQuestionRequest $request)
    {
        //create only title and body
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect('/questions')->with('success', "your question has been submitted");
    }

    public function show(Question $question)
    {
        $question->increment('views');
        return view('question.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);
        return view('question.edit', compact('question'));
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
