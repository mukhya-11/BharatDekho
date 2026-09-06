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
                BharatDekho
            </a>

            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="{{ route('explore.section','history') }}" class="hover:text-orange-300 transition">
                    Histories
                </a>

                <a href="{{ route('explore.section','festivals') }}" class="hover:text-orange-300 transition">
                    Festivals & Traditions
                </a>

                <a href="{{ route('explore.section','heritage') }}" class="hover:text-orange-300 transition">
                    Heritage Sites
                </a>

                <a href="{{ route('explore.section','culture') }}" class="hover:text-orange-300 transition">
                    Cultures
                </a>
            </div>
            @unless(View::hasSection('hideButton'))
                <a href="{{ route('upload.create') }}"
                class="bg-orange-500 px-5 py-2 rounded-full hover:bg-orange-600 transition">
                    Upload
                </a>
            @endunless

        </div>

    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>