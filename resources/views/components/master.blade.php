<!doctype html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token"
    content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}
  </title>

  <script src="{{asset('js/app.js')}}"></script>
  <link rel="stylesheet"
    href="{{asset('css/tailwind.css')}}">

</head>

<body>
  <div id="app">
    <header class="h-20 p-6 pb-4 shadow">
      <div
        class="flex justify-between items-center">

        <div class="flex items-center">
          <h1
            class="mr-4 text-2xl font-semibold uppercase">
            Blog
          </h1>
          @auth
          <nav class="text-sm text-gray-700">
            <a class="mr-2 hover:text-teal-500"
              href="/dashboard">Home
            </a>
          </nav>
          @endauth
        </div>

        <div class="text-sm text-gray-700">
          @guest
          <a class="mr-2 hover:text-teal-500"
            href="{{ route('login') }}">
            {{ __('Login') }}
          </a>
          <a class="hover:text-teal-500"
            href="{{ route('register') }}">
            {{ __('Register') }}
          </a>
          @endguest

          @auth
          <a class="hover:text-teal-500"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}
          </a>

          <form id="logout-form"
            action="{{ route('logout') }}"
            method="POST" style="display: none;">
            @csrf
          </form>
          @endauth
        </div>
      </div>
    </header>
    <main class="h-screen p-8">
      <div class="p-4 container mx-auto">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>

</html>