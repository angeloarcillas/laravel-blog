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
        <div class="mb-4 pb-4">
            <p class="mb-4 text-sm text-gray-800">
                {{$answer->body}}
            </p>
            <x-author :model="$answer"
                label="Answered"></x-author>
        </div>
        @empty
        <p>There are no answer</p>
        @endforelse
    </div>
</x-master>