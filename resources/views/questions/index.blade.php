<x-master>
  <div class="w-2/3 p-4 mx-auto">
    <div class="rounded shadow">
      <div>
        <x-feedback></x-feedback>
      </div>

      <div class="flex justify-between">
        <h2>All Questions</h2>
        <a href="{{route('questions.create')}}">Ask
          Question</a>

        @forelse ($questions as $question)
        <div>

        </div>
        @empty
        <p>No question</p>
        @endforelse
      </div>


      <div class="flex">
        <div
          class="flex justify-between flex-col">
          <p>
            <span>{{ $question->votes_count }}</span>
            {{ Str::plural('vote',$question->votes_count) }}
          </p>

          <p class="{{ $question->status }}">
            <span>{{ $question->answers_count }}</span>
            {{ Str::plural('answer',$question->answers_count) }}>
          </p>

          <p>
            <span>{{$question->views}}</span>
            {{ Str::plural('view',$question->views)}}
          </p>
        </div>

        <div class="flex flex-1">
          <div class="flex justify-between">
            <h3>{{$question->title}}</h3>
            <div>
              <a href="#">Edit</a>
              <a href="#">Delete</a>
            </div>
          </div>
          <p>Asked by: {{$question->user->name}}
          </p>
          <p>
            {{$question->created_at->diffForHumans()}}
          </p>
          <p>
            {{ Str::limit($question->body, 255) }}
          </p>
        </div>
      </div>

      {{ $questions->links() }}
    </div>
  </div>
</x-master>

{{--
          @can ('update', $question)
          <a href="{{ route('questions.edit',$question->id) }}"
class="btn btn-sm btn-outline-info">Edit</a>
@endcan

@can ('delete', $question)
<form class="d-inline"
  action="{{ route('questions.destroy',$question->id) }}"
  method="post">
  @method('DELETE')
  @csrf
  <button type="submit" name="button"
    class="btn btn-sm btn-danger"
    onclick="return confirm('Are you sure?')">Delete</button>
</form>
@endcan