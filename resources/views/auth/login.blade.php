<x-master>
    <div class="w-1/3 p-4 mx-auto rounded shadow">
        <h2
            class="mb-6 text-lg text-gray-900 font-semibold uppercase">
            Login
        </h2>

        <form method="POST"
            action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-semibold mb-2">
                    {{ __('E-Mail Adress') }}
                </label>

                <input
                    class="w-full border px-2 py-1 rounded
                    focus:border-blue-500 focus:shadow-outline outline-none
                    @error('email') border-red-500 @enderror"
                    type="email" name="email"
                    value="{{ old('email') }}"
                    required autocomplete="email"
                    autofocus>

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
                    autocomplete="password"
                    autofocus>

                @error('password')
                <span
                    class="text-xs text-red-400 italic">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-4 text-sm">
                <label class="text-gray-700">
                    <input type="checkbox"
                        name="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div
                class="flex justify-between items-end mb-4">
                <button
                    class="px-4 py-2 text-sm rounded text-white font-semibold
                     bg-teal-500 focus:outline-none hover:bg-teal-400"
                    type="submit">
                    {{ __('Login') }}
                </button>
                <a class="text-xs text-gray-700
                hover:text-blue-400 hover:underline"
                    href="#">
                    Forgot Your Password?
                </a>
            </div>
        </form>
    </div>
</x-master>