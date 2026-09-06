@extends('layouts.app')

@section('title', 'BharatDekho')

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
            BharatDekho
        </h1>

        <p class="mt-6 text-lg md:text-2xl text-gray-200 leading-relaxed max-w-2xl">
            Journey through monuments, festivals, traditions, dynasties and the diverse cultures of every states of India.
        </p>

        <div class="mt-10 flex gap-4 flex-wrap">
            <a href="#india-map-section"
               class="bg-orange-500 hover:bg-orange-600 px-8 py-4 rounded-full font-semibold transition duration-300">
                Explore India
            </a>

            <a href="{{ route('timeline') }}"
            class="border border-white hover:bg-white hover:text-black px-8 py-4 rounded-full font-semibold transition duration-300">
                Journey Through Time
            </a>
        </div>

    </div>

</section>



<section id="india-map-section" class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16 py-6">
            <p class="uppercase tracking-[6px] text-orange-500 font-bold mb-3">
                Interactive India Map
            </p>

            <h2 class="text-5xl md:text-6xl font-black text-gray-900 leading-tight mb-6">
                Explore India State by State
            </h2>

            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Click on any state to discover India's rich cultural heritage and explore monuments, festivals, food, music, and traditions.
            </p>
        </div>

        <div class="relative bg-orange-50 rounded-[40px] p-4 md:p-8 min-h-[1150px] shadow-xl border border-orange-100 overflow-hidden">        
            <div id="tooltip"
                class="hidden absolute px-4 py-2 bg-gray-900 text-white rounded-full text-sm pointer-events-none z-50">
            </div>

            @include('components.india-map')
        </div>

    </div>

</section>

@endsection