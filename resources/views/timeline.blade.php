@extends('layouts.app')
@section('hideNavbar', true)
@section('title', 'Journey Through Time')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-100 flex items-center justify-center px-6">

    <div class="max-w-4xl text-center">

        <p class="uppercase tracking-[6px] text-orange-500 font-bold mb-4">
            Coming Soon
        </p>

        <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-6">
            Journey Through Time
        </h1>

        <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-10">
            Travel across thousands of years of Indian history — from the Indus Valley Civilization and ancient kingdoms to empires, freedom movements, and modern India.
        </p>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-orange-100">
            <h2 class="text-2xl font-bold text-orange-600 mb-4">
                🚧 Timeline Feature Under Development
            </h2>

            <p class="text-gray-600">
                This page will soon include an interactive historical timeline with dynasties, major events, cultural eras, monuments, and historical figures.
            </p>
        </div>

        <div class="mt-10">
            <a href="{{ route('home') }}"
               class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-semibold transition">
                ← Back to Home
            </a>
        </div>

    </div>

</section>

@endsection