@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h2>All Questions</h2>
            <div class="ml-auto">
              <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          @include('layouts._messages')
          @forelse ($questions as $question)
          <div class="media">
            <div class="d-flex flex-column counters">
              <div class="vote">
                <strong>{{ $question->votes_count }}</strong>
                {{-- 0-1 => vote | 2+ => votes --}}
                <span> {{ \Str::plural('vote',$question->votes_count) }}</span>
              </div>
              <div class="status {{ $question->status }}">
                <strong>{{ $question->answers_count }}</strong>
                <span> {{ \Str::plural('answer',$question->answers_count) }}</span>
              </div>
              <div class="view mt-2">
                <p>{{ $question->views." ". \Str::plural('view',$question->views)}}</p>
              </div>
            </div>
            <div class="media-body">
              <div class="d-flex align-items-center">
                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a> </h3>
                <div class="ml-auto">

                  @can ('update', $question)
                  <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                  @endcan

                  @can ('delete', $question)
                  <form class="d-inline" action="{{ route('questions.destroy',$question->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" name="button" class="btn btn-sm btn-danger"
                      onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                  @endcan

                </div>
              </div>
              <p class="lead mb-0">Asked by: <a href="{{ $question->user->url }}">{{ $question->user->name }}</a> </p>
              <small class="text-muted">{{ $question->created_date }}</small>
                                      {{-- limit output text --}}
              <p class="mt-3">{{ Str::limit($question->body,250) }}</p>
            </div>
          </div>
          <hr>
          @empty
          <p>There are no question</p>
          @endforelse
          <div class="">
            {{-- php artisan vendor:publish --tag=laravel-pagination --}}
            {{ $questions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection