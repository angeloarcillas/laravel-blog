@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                        <h1>Editting answer for question: <strong>{{ $question->title }}</strong></h1>
                        </div>
                        <hr>
                    <form action="{{ route('questions.answers.update',[$question->id,$answer->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                            <textarea name="body" rows="7" id="" class="form-control @error('body') is-invalid @enderror">{{old('body',$answer->body)}}</textarea>
                                @error('body')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong> </div>
                            @enderror
        
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-5 float-right" >Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection