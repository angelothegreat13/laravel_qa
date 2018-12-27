@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-left">
                        <h3>Ask Question</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="question_title">Question Title</label>
                      <input type="text" name="question_title" id="question_title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                      @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>    
                        </div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="question_body">Explain your Question</label>
                      <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="question_body" id="question_body" rows="3"></textarea>
                      @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>    
                        </div>
                      @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Ask this Question</button>
                    </div>
                
                </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
