@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Edit Question</h2>
                        <div class="ml-auto">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="" action="{{ route('questions.update',$question->id) }}" method="post">
                        @method('PATCH')
                        @include('question._form',['btnText' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection