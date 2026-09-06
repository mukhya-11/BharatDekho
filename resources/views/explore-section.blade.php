@extends('layouts.app')
@section('hideNavbar', true)
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

    <section class="text-center mb-10">
        <h1 class="text-5xl font-black text-orange-700">
            {{ $titles[$section] }}
        </h1>

        <p class="text-gray-600 mt-4">
            Explore every {{ strtolower($titles[$section]) }} across India,
            sorted alphabetically.
        </p>
    </section>

    <!-- Search Bar -->
    <div class="max-w-4xl mx-auto px-6 mb-12">

        <div class="bg-white shadow-lg rounded-2xl p-3 flex flex-col md:flex-row gap-3">

            <input
                type="text"
                id="searchInput"
                placeholder="Search by name..."
                class="flex-1 px-5 py-3 rounded-xl border border-orange-200 focus:ring-2 focus:ring-orange-400 focus:outline-none"
            >

            <button
                id="searchBtn"
                class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-xl transition">
                Search
            </button>

            <button
                id="resetBtn"
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-xl transition">
                Reset
            </button>

        </div>

        <!-- Search Result Heading -->
        <div id="searchHeading" class="hidden mt-6">
            <h2 class="text-2xl font-bold text-orange-700">
                Matching Results:
            </h2>
        </div>

    </div>

    <div id="content-list"
         class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-8">

    @forelse($items as $item)
        <div class="search-card bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition"
            data-name="{{ strtolower($item->name) }}"> 

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

    @empty
        <div class="md:col-span-2 text-center py-16">
            <p class="text-2xl font-semibold text-gray-500">No data available.</p>
        </div>
    @endforelse

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

    if (loading || !hasMore || searchActive) return;

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
                <div class="search-card bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition"
                    data-name="${item.name.toLowerCase()}">

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

const searchInput = document.getElementById("searchInput");
const searchBtn = document.getElementById("searchBtn");
const resetBtn = document.getElementById("resetBtn");
const searchHeading = document.getElementById("searchHeading");

let searchActive = false;

function performSearch() {

    const query = searchInput.value.trim().toLowerCase();

    if (query.length < 3) {
        alert("Please type at least 3 letters.");
        return;
    }

    const cards = document.querySelectorAll(".search-card");
    let found = false;

    cards.forEach(card => {

        const name = card.dataset.name;

        // Match beginning of ANY word
        const words = name.split(" ");

        const match = words.some(word => word.startsWith(query));

        if (match) {
            card.classList.remove("hidden");
            found = true;
        } else {
            card.classList.add("hidden");
        }

    });

    searchHeading.classList.remove("hidden");
    searchActive = true;

    // Disable infinite scroll while searching
    hasMore = false;

    // Show "No matching results"
    let noResult = document.getElementById("noResults");

    if (!found) {

        if (!noResult) {
            noResult = document.createElement("div");
            noResult.id = "noResults";
            noResult.className =
                "col-span-2 text-center py-16 text-gray-500 text-2xl font-semibold";
            noResult.innerText = "No matching results found.";
            document.getElementById("content-list").appendChild(noResult);
        }

    } else if (noResult) {
        noResult.remove();
    }

}

function resetSearch() {

    searchInput.value = "";

    document.querySelectorAll(".search-card").forEach(card => {
        card.classList.remove("hidden");
    });

    const noResult = document.getElementById("noResults");
    if (noResult) noResult.remove();

    searchHeading.classList.add("hidden");

    searchActive = false;

    // Restore infinite scroll
    hasMore = true;

}

// Button click
searchBtn.addEventListener("click", performSearch);

// Enter key
searchInput.addEventListener("keydown", function(e){
    if(e.key === "Enter"){
        performSearch();
    }
});

// Reset
resetBtn.addEventListener("click", resetSearch);
</script>

@endsection