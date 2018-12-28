@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Ask Question</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                <form action="{{ route('questions.store') }}" method="POST">
                   @include('questions.form',['buttonText' => 'Ask Question'])
                </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
