@extends('layouts.app')

@section('content')

@php
    // Capitalize section nicely.
    $title = ucfirst($section);
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

    <!-- Featured Image -->
    <section class="max-w-6xl mx-auto px-6">

        <div class="rounded-[30px] overflow-hidden shadow-xl border border-orange-100">
            <img
                src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?q=80&w=1400&auto=format&fit=crop"
                alt="Dummy Image"
                class="w-full h-[260px] md:h-[480px] object-cover"
            >
        </div>

    </section>

    <!-- Gallery -->
    <section
        x-data="gallery()"
        class="max-w-6xl mx-auto px-6 py-16"
    >

        <div class="flex items-center justify-between mb-6">

            <div>
                <h2 class="text-3xl font-bold text-gray-900">
                    Photo Gallery
                </h2>

                <p class="text-gray-500 mt-2">
                    Images related to {{ $title }} of {{ $state }}.
                </p>
            </div>

        </div>

        <!-- Active Image -->
        <div class="rounded-3xl overflow-hidden shadow-lg border border-orange-100">

            <template x-for="(image,index) in images" :key="index">
                <img
                    x-show="current===index"
                    :src="image"
                    class="w-full h-[230px] md:h-[450px] object-cover"
                    x-transition.opacity
                >
            </template>

        </div>

        <!-- Dots -->
        <div class="flex justify-center mt-6 gap-3">

            <template x-for="(image,index) in images" :key="'dot'+index">

                <button
                    @click="current=index"
                    class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="current===index
                        ? 'bg-orange-500 w-8'
                        : 'bg-orange-200 hover:bg-orange-300'">
                </button>

            </template>

        </div>

        <!-- Prev / Next -->
        <div class="flex justify-center gap-4 mt-8">

            <button
                @click="prev()"
                class="px-5 py-2 rounded-full bg-white border shadow hover:bg-orange-50">
                ← Previous
            </button>

            <button
                @click="next()"
                class="px-5 py-2 rounded-full bg-orange-500 text-white shadow hover:bg-orange-600">
                Next →
            </button>

        </div>

    </section>

    <!-- Description -->
    <section class="max-w-6xl mx-auto px-6 pb-24">

        <div class="bg-white rounded-[28px] shadow-lg border border-orange-100 p-8">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-2 h-10 bg-orange-500 rounded-full"></div>

                <h2 class="text-3xl font-bold text-gray-900">
                    About {{ $title }} of {{ $state }}
                </h2>
            </div>

            <div class="leading-8 text-gray-700 text-lg space-y-6">

                <p>
                    This is a placeholder content section. Eventually this page will contain
                    detailed information about {{ $state }}'s {{ strtolower($title) }} with
                    rich articles, timelines, stories, maps, references, and photographs.
                </p>

                <p>
                    The description box automatically grows with the amount of content because
                    it has no fixed height. You can later output long content from your database
                    here without changing the layout.
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae
                    pellentesque lacus. Integer volutpat urna vel justo pellentesque,
                    quis fermentum arcu tincidunt. Curabitur feugiat sem non elit feugiat,
                    sit amet tristique neque faucibus. Pellentesque habitant morbi tristique
                    senectus et netus et malesuada fames ac turpis egestas.
                </p>

            </div>

        </div>

    </section>

</div>

<!-- Alpine Gallery -->
<script>
    function gallery() {
        return {
            current: 0,
            images: [
                "https://images.unsplash.com/photo-1524492412937-b28074a5d7da?q=80&w=1400&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1477587458883-47145ed94245?q=80&w=1400&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1506461883276-594a12b11cf3?q=80&w=1400&auto=format&fit=crop",
                "https://images.unsplash.com/photo-1514222134-b57cbb8ce073?q=80&w=1400&auto=format&fit=crop"
            ],

            next() {
                this.current = (this.current + 1) % this.images.length;
            },

            prev() {
                this.current =
                    (this.current - 1 + this.images.length) % this.images.length;
            }
        }
    }
</script>

@endsection