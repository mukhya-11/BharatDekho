@extends('layouts.app')

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
                    <img src="https://images.unsplash.com/photo-1593693411515-c20261bcad6e?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
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
                    <img src="https://images.unsplash.com/photo-1604608672516-8ff3b521d0e1?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Festivals & Traditons</h3>
                        <p class="text-gray-600 mt-2">Celebrate India's vibrant traditions and seasonal festivals.</p>
                    </div>
                </div>
            </a>
            

            <a href="{{ route('states.section', ['state' => Str::slug($state), 'section' => 'culture']) }}" class="block bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">
                    <img src="https://images.unsplash.com/photo-1583396618422-5977b36d1f8d?q=80&w=900&auto=format&fit=crop" class="h-52 w-full object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl">Culture</h3>
                        <p class="text-gray-600 mt-2">Dance, music, clothing, languages and handicrafts.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

</section>