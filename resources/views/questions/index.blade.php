@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-left">
                        <h3>All Questions</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-info"><i class="fas fa-question-circle"></i> Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts.messages')
                    
                    @foreach($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question -> status }}">
                                <strong>{{ $question->answers }}</strong> {{ str_plural('answer', $question->answers) }}
                            </div>
                            <div class="view">
                                {{ $question->views .' '. str_plural('view', $question->views) }}
                            </div>
                        </div>
                        
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <div class="ml-auto">
                                @can('update',$question)
                                    <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                @endcan

                                @can('delete',$question)
                                    <form class="form-delete" action="{{ route('questions.destroy',$question->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endcan
                                    
                                </div>
                            </div>

                            <h3 class="mt-0">
                                <p class="lead">
                                    Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                            </h3>    
                            {{ str_limit($question->body,250,'...') }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="mx-auto">
                        {{-- use this to change the pagination design  
                             php artisan vendor:publish --tag=laravel-pagination                       
                        --}}
                        {{ $questions->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
