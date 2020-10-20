<x-master>

  <x-feedback></x-feedback>

  <div class="p-2 rounded shadow">

    <div
      class="flex justify-between pb-4 mb-6 border-b">
      <h2 class="text-2xl font-semibold">All
        Questions</h2>
        @auth
        <a href="{{route('questions.create')}}"
        class="px-3 py-2 text-teal-500 border border-teal-400 rounded">Ask
        Question
      </a>
      @endauth
    </div>
    <div>
      @forelse ($questions as $question)
      <div class="my-5 px-2 flex text-sm border-b"
        style="min-height: 10rem">
        <div
          class="flex justify-between flex-col mr-2 text-center"
          style="max-height: 5rem">
          <p>
            <span
              class="block font-semibold text-lg -mb-1">{{ $question->votes_count ?? 0 }}</span>
            {{ Str::plural('vote',$question->votes_count) }}
          </p>

          <p
          class="p-1 my-2 border {{$question->status}} rounded">
          <span
          class="block -mb-1">{{ $question->answers_count ?? 0 }}</span>
          {{ Str::plural('answer',$question->answers_count) }}
        </p>

        <p>
          <span>{{$question->views ?? 0}}</span>
          {{ Str::plural('view',$question->views)}}
        </p>
      </div>

      <div class="w-full">
        <div class="flex justify-between">
        <a href="{{$question->path('show')}}"
          class="text-xl font-semibold mb-1">
          {{$question->title}}</a>
          @can ('update', $question)
          <div class="flex text-xs items-start">
                    <a href="{{ $question->path('edit') }}"
            class="mr-1 text-blue-400">Edit</a>
            @can ('delete', $question)
            <a href="#"
            class="text-red-500"
            onclick="event.preventDefault();document.querySelector('#deleteQuestion-{{$question->id}}').submit()"
            >Delete</a>
            <form id="deleteQuestion-{{$question->id}}" class="hidden"
              action="{{ $question->path('destroy') }}"
              method="post">
              @method('DELETE')
              @csrf
            </form>
            @endcan
          </div>
          @endcan
        </div>

        <p>Asked by:
          <a href="#"
          class="text-blue-400 hover:underline">
          {{$question->user->name}}
        </a>
      </p>
      <p class="text-xs text-gray-700 mb-2">
        {{$question->created_at->diffForHumans()}}
      </p>
          <p class="text-gray-900">
            {{ Str::limit($question->body, 255) }}
          </p>

        </div>
      </div>
      @empty
      <p>No question</p>
      @endforelse
      {{ $questions->links() }}
    </div>
  </div>
</x-master>

{{--

--}}