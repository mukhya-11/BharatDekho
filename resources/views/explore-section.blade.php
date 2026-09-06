@extends('layouts.app')

@section('title', ucfirst($section))

@section('content')
@php
    $titles = [
        'history' => 'Histories of India',
        'heritage' => 'Heritage Sites',
        'festivals' => 'Festivals & Traditions',
        'culture' => 'Cultures of India',
    ];
@endphp

<div class="min-h-screen bg-gradient-to-b from-amber-50 via-white to-orange-50 pt-28">

    <section class="text-center mb-14">
        <h1 class="text-5xl font-black text-orange-700">
            {{ $titles[$section] }}
        </h1>

        <p class="text-gray-600 mt-4">
            Explore every {{ strtolower($titles[$section]) }} across India,
            sorted alphabetically.
        </p>
    </section>

    <div id="content-list"
         class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-8">

        @foreach($items as $item)
            <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

<img src="{{ asset('images/' . $item->image_url) }}"
     alt="{{ $item->name }}"
     class="w-full h-56 object-cover">

                <div class="p-6">

                    <div class="flex justify-between items-center mb-3">

                        <h2 class="text-2xl font-bold text-orange-700">
                            {{ $item->name }}
                        </h2>

                        <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full">
                            {{ $item->state->name }}
                        </span>

                    </div>

                    <p class="text-gray-600 leading-relaxed">
                        {{ $item->description }}
                    </p>

                </div>

            </div>
        @endforeach

    </div>

    <div id="loader" class="text-center py-10 hidden">

        <svg class="animate-spin h-8 w-8 text-orange-500 mx-auto"
             xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24">

            <circle class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"></circle>

            <path class="opacity-75"
                  fill="currentColor"
                  d="M4 12a8 8 0 018-8v4l3-3-3-3v4a10 10 0 1010 10h-2A8 8 0 014 12z"></path>
        </svg>

        <p class="text-orange-600 mt-3 font-semibold">
            Loading more...
        </p>

    </div>

</div>

<script>
let page = 2;
let loading = false;
let hasMore = {{ $items->hasMorePages() ? 'true' : 'false' }};
const section = "{{ $section }}";

window.addEventListener('scroll', () => {

    if (loading || !hasMore) return;

    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
        loadMore();
    }

});

function loadMore(){

    loading = true;

    document.getElementById('loader').classList.remove('hidden');

    fetch(`/explore/${section}?page=${page}`, {
        headers:{
            "X-Requested-With":"XMLHttpRequest"
        }
    })
    .then(res => res.json())
    .then(data => {

        const container = document.getElementById('content-list');

        data.data.forEach(item => {

            container.insertAdjacentHTML('beforeend', `
                <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

                    <img src="/images/${item.image_url}" class="w-full h-56 object-cover" alt="${item.name}">

                    <div class="p-6">

                        <div class="flex justify-between items-center mb-3">

                            <h2 class="text-2xl font-bold text-orange-700">${item.name}</h2>

                            <span class="text-sm bg-orange-100 text-orange-700 px-3 py-1 rounded-full">
                                ${item.state.name}
                            </span>

                        </div>

                        <p class="text-gray-600 leading-relaxed">
                            ${item.description}
                        </p>

                    </div>

                </div>
            `);

        });

        hasMore = data.next_page_url !== null;
        page++;

    })
    .finally(() => {

        loading = false;
        document.getElementById('loader').classList.add('hidden');

    });

}
</script>

@endsection