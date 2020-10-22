<x-master>
    <div
        class="w-3/4 mx-auto p-2 pb-6 mb-6 shadow rounded">
        <div
            class="flex justify-between items-center mb-4">
            <h2 style="max-width: 80%"
                class="text-lg font-semibold">
                {{$question->title}}
            </h2>
            <a href="/questions" class="py-2 px-4 text-sm text-teal-400
                border border-teal-400 rounded">
                All Questions
            </a>
        </div>
        <div class="flex">
            <div class="w-1/12 text-center"
                style="max-height: 10rem">
                <p>^</p>
                <p>{{$question->voutes_count}}</p>
                <p>v</p>
                <p>*</p>
                <p>1</p>
            </div>
            <div class="flex-1 pt-2">
                <p class="mb-6 text-sm">
                    {{$question->body}}
                </p>
                </p>
                <x-author :model="$question"
                    label="Asked">
                </x-author>

            </div>
        </div>
    </div>

    <div
        class="w-3/4 mx-auto p-2 pb-6 shadow rounded">
        <h3
            class="mb-4 text-lg text-gray-700 font-semibold">
            Answers</h3>
        @forelse ($question->answers as $answer)
        <div
            class="mb-4 pb-4 border-b border-gray-300">
            @can('delete', $answer)

            <div class="mb-1 text-xs text-right">
                <a href="{{$answer->path('edit')}}"
                    class="mr-1 text-blue-400">Edit</a>
                <a href="#" class="text-red-400"
                    onclick="event.preventDefault();
                document.querySelector('#deleteAnswer-{{$answer->id}}').submit()">Delete</a>

                <form
                    id="deleteAnswer-{{$answer->id}}"
                    action="{{ $answer->path('destroy')}} "
                    method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            @endcan
            <p class="mb-4 text-sm text-gray-800">
                {{$answer->body}}
            </p>
            <x-author :model="$answer"
                label="Answered">
            </x-author>
        </div>
        @empty
        <p
            class="mb-4 text-center text-sm font-semibold italic text-gray-700">
            There are no answer
        </p>
        @endforelse
        @auth
        <div class="mx-4">
            @error('body')
            <p
                class="text-xs italic text-red-400">
                {{ $message }}
            </p>
            @enderror
            <form
                action="{{route('answer.store', $question->id)}}"
                method="post">
                @csrf
                <div class="mb-4">
                    <label
                        class="block mb-1 font-semibold text-gray-700">Reply</label>
                    <textarea name="body" rows="5"
                        class="w-1/2 p-2 text-gray-700 border rounded"
                        placeholder="Say something.."></textarea>
                </div>

                <button
                    class="py-2 px-4 mb-4 text-white bg-blue-400 rounded">
                    Submit
                </button>
            </form>
        </div>
        @endauth
    </div>
</x-master>