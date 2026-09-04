<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-amber-50 min-h-screen">

    <nav class="fixed top-0 w-full z-50 bg-black/30 backdrop-blur-md text-white border-b border-white/10">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="text-3xl font-black tracking-wide text-orange-400">
                BharatVerse
            </a>

            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="#explore" class="hover:text-orange-300 transition">Explore</a>
                <a href="#heritage" class="hover:text-orange-300 transition">Heritage</a>
                <a href="#festivals" class="hover:text-orange-300 transition">Festivals</a>
                <a href="#timeline" class="hover:text-orange-300 transition">Timeline</a>
                <a href="/profile" class="hover:text-orange-300 transition">Profile</a>
            </div>

            <button class="bg-orange-500 px-5 py-2 rounded-full hover:bg-orange-600 transition">
                Login
            </button>

        </div>

    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>