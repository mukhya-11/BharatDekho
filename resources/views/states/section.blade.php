@extends('layouts.app')

@section('content')

@php
    $titles = [
        'history' => 'History',
        'heritage' => 'Heritage Sites',
        'festivals' => 'Festivals & Traditions',
        'culture' => 'Culture',
    ];

    $title = $titles[$section] ?? ucfirst($section);
@endphp

<div class="min-h-screen bg-gradient-to-b from-amber-50 via-white to-orange-50">

    <!-- Hero -->
    <section class="relative overflow-hidden py-24">

        <div class="absolute inset-0 bg-orange-100/40 blur-3xl"></div>

        <div class="relative max-w-6xl mx-auto px-6 text-center">

            <p class="uppercase tracking-[6px] text-orange-500 font-bold">
                BharatDekho • {{ $state }}
            </p>

            <h1 class="text-5xl md:text-6xl font-black text-gray-900 mt-4">
                {{ $title }} of {{ $state }}
            </h1>

            <p class="text-gray-600 mt-6 text-lg max-w-3xl mx-auto">
                This page will showcase the complete {{ strtolower($title) }} of {{ $state }},
                including stories, monuments, traditions, images, and historical information.
            </p>

        </div>

    </section>

    <!-- Content Section -->
    <section class="max-w-6xl mx-auto px-6 pb-24">

        <div class="flex items-center gap-3 mb-10">
            <div class="w-2 h-10 bg-orange-500 rounded-full"></div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ $title }} of {{ $state }}
            </h2>
        </div>

        @forelse($content as $item)

            <article class="bg-white rounded-[28px] shadow-lg border border-orange-100 overflow-hidden mb-10">

                {{-- Image --}}
                @if($item->image_url)
                    <img
                        src="{{ asset('images/' . $item->image_url) }}"
                        alt="{{ $item->name }}"
                        class="w-full h-auto max-h-120 object-cover object-center"
                    >
                @endif

                {{-- Content --}}
                <div class="p-8">

                    <h3 class="text-3xl font-bold text-gray-900 mb-0.4">
                        {{ $item->name }}
                    </h3>

                    <div class="text-gray-700 leading-8 text-lg whitespace-pre-line">
                        {{ $item->description }}
                    </div>

                </div>

            </article>

        @empty

            <div class="bg-white rounded-3xl border border-orange-100 p-10 text-center">

                <p class="text-gray-500 text-lg">
                    No data have been added for {{ $state }} yet.
                </p>

            </div>

        @endforelse

    </section>
@endsection