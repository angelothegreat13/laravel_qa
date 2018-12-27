<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{
    
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index',compact('questions'));
    }
   
    public function create()
    {
        $questions = new Question;
        
        return view('questions.create',compact('questions'));
    }

    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', 'Your question has been Submitted.');
    }

    public function show(Question $question)
    {

    }

    public function edit(Question $question)
    {   
        return view('questions.edit',compact('question'));
    }
   
    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', 'Your question has been Updated.');        
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('/questions')->with('success', 'Your question has been Deleted.');
    }


}
