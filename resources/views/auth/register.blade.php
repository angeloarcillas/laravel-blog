<x-master>
    <div class="w-1/3 p-4 mx-auto rounded shadow">
        <h2
            class="mb-6 text-lg text-gray-900 font-semibold uppercase">
            Register
        </h2>
        <form method="POST" action="{{ route('register') }}
         ">
            @csrf

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-semibold mb-2">
                    {{ __('Name') }}
                </label>

                <input
                    class="w-full border px-2 py-1 rounded
                    focus:border-blue-500 focus:shadow-outline outline-none
                    @error('name') border-red-500 @enderror"
                    type="text" name="name"
                    value="{{ old('name') }}"
                    required autocomplete="name"
                    autofocus>

                @error('name')
                <span
                    class="text-xs text-red-400 italic">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-semibold mb-2">
                    {{ __('E-Mail Address') }}
                </label>

                <input
                    class="w-full border px-2 py-1 rounded
                    focus:border-blue-500 focus:shadow-outline outline-none
                    @error('email') border-red-500 @enderror"
                    type="email" name="email"
                    value="{{ old('email') }}"
                    required autocomplete="email">

                @error('email')
                <span
                    class="text-xs text-red-400 italic">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-semibold mb-2">
                    {{ __('Password') }}
                </label>

                <input
                    class="w-full border px-2 py-1 rounded
                    focus:border-blue-500 focus:shadow-outline outline-none
                    @error('password') border-red-500 @enderror"
                    type="password"
                    name="password"
                    value="{{ old('password') }}"
                    required
                    autocomplete="password">

                @error('password')
                <span
                    class="text-xs text-red-400 italic">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-semibold mb-2">
                    {{ __('Confirm Password') }}
                </label>

                <input
                    class="w-full border px-2 py-1 rounded
                    focus:border-blue-500 focus:shadow-outline outline-none
                    @error('password_confirmation') border-red-500 @enderror"
                    type="password"
                    name="password_confirmation"
                    value="{{ old('password_confirmation') }}"
                    required
                    autocomplete="password_confirmation">

                @error('password_confirmation')
                <span
                    class="text-xs text-red-400 italic">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div
                class="flex justify-between items-end mb-4">
                <button
                    class="px-4 py-2 text-sm rounded text-white font-semibold
                     bg-teal-500 focus:outline-none hover:bg-teal-400"
                    type="submit">
                    {{ __('Register') }}
                </button>
                <a class="text-xs text-gray-700
                hover:text-blue-400 hover:underline"
                    href="#">Already have and
                    account?</a>
            </div>
        </form>
    </div>
</x-master>