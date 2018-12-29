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
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

    public function edit(Question $question)
    {   
        if (\Gate::denies('update-question',$question)) {
            abort(403,'Access Denied');
        }
        return view('questions.edit',compact('question'));
    }
   
    public function update(AskQuestionRequest $request, Question $question)
    {   
        if (\Gate::denies('update-question',$question)) {
            abort(403,'Access Denied');
        }
        $question->update($request->only('title', 'body'));
        return redirect('/questions')->with('success', 'Your question has been Updated.');        
    }

    public function destroy(Question $question)
    {
        if (\Gate::denies('delete-question',$question)) {
            abort(403,'Access Denied');
        }
        $question->delete();
        return redirect('/questions')->with('success', 'Your question has been Deleted.');
    }


}
