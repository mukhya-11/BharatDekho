@extends('layouts.app')

@section('title', 'BharatVerse')

@section('content')

<section class="relative h-screen pt-20 overflow-hidden">

    <img
        src="https://images.unsplash.com/photo-1564507592333-c60657eea523?q=80&w=1800&auto=format&fit=crop"
        class="absolute inset-0 w-full h-full object-cover"
        alt="Taj Mahal"
    >

    <div class="absolute inset-0 bg-black/55"></div>

    <div class="relative z-10 flex flex-col justify-center h-full px-8 lg:px-20 text-white max-w-4xl">

        <p class="uppercase tracking-[6px] text-orange-300 font-semibold mb-4">
            Discover India's Living Heritage
        </p>

        <h1 class="text-5xl md:text-7xl font-black leading-tight">
            BharatVerse
        </h1>

        <p class="mt-6 text-lg md:text-2xl text-gray-200 leading-relaxed max-w-2xl">
            Journey through monuments, festivals, traditions, dynasties and the diverse cultures of every state and district of India.
        </p>

        <div class="mt-10 flex gap-4 flex-wrap">
            <a href="#explore"
               class="bg-orange-500 hover:bg-orange-600 px-8 py-4 rounded-full font-semibold transition duration-300">
                Explore India
            </a>

            <a href="#timeline"
               class="border border-white hover:bg-white hover:text-black px-8 py-4 rounded-full font-semibold transition duration-300">
                Journey Through Time
            </a>
        </div>

    </div>

</section>

<div class="-mt-1">
    <svg viewBox="0 0 1440 120" class="w-full fill-amber-50">
        <path d="M0,64L80,74.7C160,85,320,107,480,101.3C640,96,800,64,960,53.3C1120,43,1280,53,1360,58.7L1440,64V160H0Z"></path>
    </svg>
</div>

<section id="explore" class="py-24 bg-amber-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">
            <p class="text-orange-500 uppercase tracking-[5px] font-bold">
                Explore India
            </p>

            <h2 class="text-5xl font-black mt-3 text-gray-900">
                Every State Has A Story
            </h2>

            <p class="text-gray-600 mt-4 max-w-2xl mx-auto text-lg">
                Discover heritage monuments, ancient civilizations, festivals, food, dance, music, and traditions across India's diverse states.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <a href="/heritage" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1599661046289-e31897846e41?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Heritage Sites</h3>
                        <p class="text-gray-600 mt-2">UNESCO monuments, forts, temples and ancient architecture.</p>
                    </div>
                </div>
            </a>
            

            <a href="/festivals" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1604608672516-8ff3b521d0e1?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Festivals</h3>
                        <p class="text-gray-600 mt-2">Celebrate India's vibrant traditions and seasonal festivals.</p>
                    </div>
                </div>
            </a>
            

            <a href="/culture" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1583396618422-5977b36d1f8d?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Culture</h3>
                        <p class="text-gray-600 mt-2">Dance, music, clothing, languages and handicrafts.</p>
                    </div>
                </div>
            </a>

            <a href="/journey" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1593693411515-c20261bcad6e?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Journey Through Time</h3>
                        <p class="text-gray-600 mt-2">Explore dynasties from the Indus Valley to Modern India.</p>
                    </div>
                </div>
            </a>

        </div>

    </div>

</section>

@endsection