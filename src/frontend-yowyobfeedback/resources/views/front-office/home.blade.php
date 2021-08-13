@extends('front-office.layouts.app')

@section('content')

    {{-- Presentation WiconetLabs --}}
    <div class="w-full bg-fixed bg-cover lg:h-128" id="WiconetLabs"
        style="background-image: url({{ asset('images/lab.jfif') }})">
        <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
            <div class="text-center">
                <h1 class="text-4xl font-semibold pt-4 md:pt-0 text-indigo-500 md:text-5xl tracking-widest underline">
                    WiconetLabs</h1>
                <p class="w-full px-10 mt-10 py-4 md:py-6 text-xl font-medium text-white Capitalize leading-10 ">
                    WiconetLab est un laboratoire du CETIC/ENSP qui explore les questions de recherche liées à La mise en
                    réseau des équipements informatiques, des applications et services.
                </p>
            </div>
        </div>
    </div>

    <section class="md:px-20 dark:bg-gray-800" x-data="{showModal : true}">

        @if (session('message'))
            <x-feedback-success>
            </x-feedback-success>
        @endif

        {{-- Presentation Produits --}}

        <div class="container xl:w-full w-11/12 mx-auto pt-16" id="Realisations">
            <div class="w-full">
                <h1
                    class="text-3xl xl:text-5xl font-extrabold text-gray-800  dark:text-gray-200 mx-auto text-center xl:text-left mb-4">
                    Nos
                    Réalisations</h1>
                <p class="text-xl text-gray-600 dark:text-white xl:w-3/4 w-11/12 mx-auto xl:mx-0 text-center sm:text-left">
                    WiconetLabs est
                    un laboratoire ayant de multiples réalisations.</p>
            </div>
            <div class=" xl:flex lg:flex md:flex sm:flex flex-wrap justify-start pt-20">
                @foreach ($achievements as $achievement)
                    @if ($achievement->state)
                        <div class="w-80 px-8 py-4 mx-2 mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <div class="flex justify-center -mt-16 md:justify-end">
                                <img class="object-cover w-20 h-20 border-2 border-indigo-500 rounded-full dark:border-indigo-400"
                                    alt="" src="@if ($achievement->image == '') {{ asset('images/logo2.png') }}
                                @else{{ Storage::url($achievement->image) }} @endif">
                            </div>

                            <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">
                                {{ $achievement->title }}
                            </h2>

                            <p class="mt-2 text-gray-600 dark:text-gray-200">{{ $achievement->description }}</p>

                            <div class="flex justify-end mt-4">
                                <a href="{{ $achievement->link }}"
                                    class="text-xl font-medium text-indigo-500 dark:text-indigo-300 hover:underline">En
                                    savoir plus</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Members --}}


        <div class="container xl:w-full w-11/12 mx-auto pt-16" id="Membres">
            <div class="w-full md:text-center">
                <h1
                    class="text-3xl xl:text-5xl font-extrabold text-gray-800 dark:text-gray-200 mx-auto text-center xl:text-left mb-4">
                    Membres
                </h1>
                <p class="text-xl text-gray-600 xl:w-3/4 w-11/12 mx-auto xl:mx-0 text-center dark:text-white sm:text-left">
                    Ce sont Les
                    personnes talentueuses dans les coulisses de l'organisation.</p>
            </div>
            <div role="list" class="sm:flex flex-wrap sm:pt-20 pt-12">
                @foreach ($members as $member)
                    <div role="listitem" class="w-full sm:w-1/2 md:w-1/3 p-2">
                        <div
                            class="max-w-lg shadow-md rounded border border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700 dark:shadow">
                            <div class="flex flex-col items-center py-8">
                                <div class="w-32 h-32 rounded-full shadow-md">
                                    <img src="{{ Storage::url($member->image) }}" alt="Display Picture of Silene Tokyo"
                                        role="img" class="rounded-full object-cover h-full w-full" />
                                </div>
                                <h1 class="text-xl text-gray-800 pt-4 pb-1 font-normal dark:text-gray-200">
                                    {{ $member->name }} {{ $member->firstname }}
                                </h1>
                                <p class="text-base text-gray-600 dark:text-white">{{ $member->job }}</p>
                            </div>
                            <div class="border-t border-gray-200 dark:border-gray-700  w-full py-4">
                                <p class="text-center text-gray-600 text-base font-normal dark:text-white">
                                    {{ $member->email }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        {{-- Feedback --}}

        <div class="container mx-auto pt-16" id="Feedback">
            <div class="pb-12">
                <h1
                    class="text-3xl xl:text-5xl font-extrabold text-gray-800 mx-auto text-center xl:text-left mb-4 dark:text-gray-200">
                    Feedback
                </h1>
                <p class="text-xl text-gray-600 xl:w-3/4 w-11/12 mx-auto xl:mx-0 text-center sm:text-left dark:text-white">
                    Ce sont les
                    commentaires laissé par les personnes ayant fait un passage au laboratoire WiconetLabs.</p>
            </div>
            <section id="carousel">
                <div class="carousel owl-carousel w-full">
                    @foreach ($feedbacks as $feedback)
                        @if ($feedback->state == 1)
                            <div class="w-full px-4">
                                <div class="shadow-lg mb-2 rounded">
                                    <div class="bg-indigo-700 pt-6 pb-6 pl-6 rounded-tl rounded-tr">
                                        <h1 class="text-xl text-white pb-1">{{ $feedback->name }}
                                            {{ $feedback->firstname }}</h1>
                                        <p class="text-sm text-gray-200">{{ $feedback->email }}</p>
                                        <p class="text-base text-indigo-200">{{ $feedback->job }}</p>
                                    </div>
                                    <div class="pl-6 pr-6 pt-10 relative h-64">
                                        <div
                                            class="h-16 w-16 rounded-full bg-cover border-4 border-white absolute top-0 right-0 -mt-8 mr-6">
                                            <img src="{{ Storage::url($feedback->image) }}"
                                                alt="Display Avatar of Alex Parkinson" role="img"
                                                class="h-full w-full object-cover rounded-full overflow-hidden" />
                                        </div>

                                        <p class="text-base text-gray-600 leading-8 dark:text-white">
                                            {{ $feedback->comments }}</p>
                                        <div class="flex justify-end mt-2">
                                            <svg width="44" height="37" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.432 0c-2.339 0-4.329.821-5.97 2.463C.82 4.105 0 6.093 0 8.429c0 2.335.82 4.324 2.462 5.966 1.641 1.642 3.631 2.463 5.97 2.463 2.113 0 3.386.84 3.82 2.518.434 1.678.217 3.54-.65 5.583-.868 2.043-2.32 3.904-4.358 5.582C5.206 32.22 2.792 33.06 0 33.06V37c5.018 0 9.196-1.925 12.535-5.774 3.34-3.85 5.518-8.083 6.537-12.699 1.018-4.616.726-8.857-.878-12.725C16.591 1.934 13.337 0 8.432 0zm24.335 0c-2.34 0-4.33.821-5.97 2.463-1.642 1.642-2.462 3.63-2.462 5.966 0 2.335.82 4.324 2.462 5.966 1.64 1.642 3.63 2.463 5.97 2.463 2.113 0 3.396.84 3.848 2.518.453 1.678.236 3.54-.65 5.583-.887 2.043-2.34 3.904-4.358 5.582-2.019 1.679-4.443 2.518-7.272 2.518V37c5.018 0 9.196-1.925 12.535-5.774 3.339-3.85 5.518-8.083 6.536-12.699 1.02-4.616.727-8.857-.877-12.725C40.926 1.934 37.672 0 32.767 0z"
                                                    fill="#667EEA" fill-rule="evenodd" fill-opacity=".15" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </section>
@endsection
