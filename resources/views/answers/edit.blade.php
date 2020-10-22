<x-master>
    <div class="w-1/2 mx-auto shadow rounded">
        <div class="p-4">
            <h2 class="mb-4 text-lg font-semibold">Edit Answer</h2>
            @error('body')
            <div
                class="text-xs italic text-red-400">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <form method="POST"
                action="{{ $answer->path('update') }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <textarea name="body" rows="7"
                        class="w-full p-2 px-4 border rounded">{{old('body',$answer->body)}}</textarea>

                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="py-2 px-4 text-white bg-blue-400 rounded">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-master>