<?php

namespace App\Http\Controllers;

use App\Question;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Question $question)
    {
        //pivot table
        $question->favorites()->toggle(auth()->id());
        return back();
    }
}
