@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3>Edit Question</h3>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    @method('PATCH')
                    @include('questions.form',['buttonText' => 'Update Question'])
                </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
