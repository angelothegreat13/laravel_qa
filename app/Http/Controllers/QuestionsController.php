<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth',['index','show']);
    }
    
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index',compact('questions'));
    }
   
    public function create()
    {
        $question = new Question;

        return view('questions.create',compact('question'));
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
        $this->authorize('update', $question);

        return view('questions.edit',compact('question'));
    }
   
    public function update(AskQuestionRequest $request, Question $question)
    {   
        $this->authorize('update', $question);

        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', 'Your question has been Updated.');        
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();
        
        return redirect('/questions')->with('success', 'Your question has been Deleted.');
    }


}
