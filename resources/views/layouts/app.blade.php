<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    @if(session('logged_in'))
        @include('components.navbar')
    @endif

    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    @if(session('logged_in'))
        @include('components.footer')
    @endif
</body>
</html>
