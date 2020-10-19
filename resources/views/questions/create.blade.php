<x-master>

    <div class="w-1/2 mx-auto rounded shadow p-4">
        <h2 class="mb-6 text-lg text-gray-700">Ask
            a questtion</h2>

            @if ($errors->any())
            <div class="mb-4">
                @foreach ($errors->all() as $error)
                <p class="text-xs italic text-red-400">
                    {{$error}}
                </p>
                @endforeach
            </div>
            @endif
            <form
            action="{{route('questions.store')}}"
            method="POST">
            @csrf

            <div class="mb-4">
                <label
                    class="block mb-1 font-semibold text-gray-700">Title</label>
                <input type="text" name="title" value="{{old('title')}}"
                    class="w-full px-2 py-2 text-gray-700 border rounded">
            </div>
            <div class="mb-4">
                <label
                    class="block mb-1 font-semibold text-gray-700">body</label>
            <textarea name="body" rows="10" value="{{old('body')}}"
                    class="w-full p-2 text-gray-700 border rounded"></textarea>
            </div>
            <div class="mb-4">
                <button
                    class="px-6 py-2 text-white bg-blue-400 rounded hover:bg-blue-500">Submit</button>
            </div>
        </form>
    </div>
</x-master>