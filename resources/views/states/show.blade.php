@extends('layouts.app')
@section('hideNavbar', true)
@section('content')

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
                Discover heritage monuments, ancient civilizations, festivals & traditions of {{ $state }}.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <a href="{{ route('states.section', ['state' => Str::slug($state), 'section' => 'history']) }}" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://plus.unsplash.com/premium_photo-1697730399235-bcca956cc6d7?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8aW5kaWElMjBoaXN0b3J5fGVufDB8fDB8fHww" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">History</h3>
                        <p class="text-gray-600 mt-2">Explore dynasties from the Indus Valley to Modern India.</p>
                    </div>
                </div>
            </a>


            <a href="{{ route('states.section', ['state' => Str::slug($state), 'section' => 'heritage']) }}" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1599661046289-e31897846e41?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Heritage Sites</h3>
                        <p class="text-gray-600 mt-2">UNESCO monuments, forts, temples and ancient architecture.</p>
                    </div>
                </div>
            </a>
            

            <a href="{{ route('states.section', ['state' => Str::slug($state), 'section' => 'festivals']) }}" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://plus.unsplash.com/premium_photo-1729038870113-96b77abd8f34?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGluZGlhJTIwZmVzdGl2YWx8ZW58MHx8MHx8fDA%3D" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Festivals & Traditons</h3>
                        <p class="text-gray-600 mt-2">Celebrate India's vibrant traditions and seasonal festivals.</p>
                    </div>
                </div>
            </a>
            

            <a href="{{ route('states.section', ['state' => Str::slug($state), 'section' => 'culture']) }}" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1615184697985-c9bde1b07da7?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aW5kaWElMjBjdWx0dXJlfGVufDB8fDB8fHww" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Culture</h3>
                        <p class="text-gray-600 mt-2">Dance, music, clothing, languages and handicrafts.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

</section>