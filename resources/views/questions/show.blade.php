@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>{{ $question->title }}</h1>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- This will echo with html --}}
                    {!! $question->body_html !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
