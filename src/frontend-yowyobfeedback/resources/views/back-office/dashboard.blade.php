@extends('back-office.layouts.app')

@section('content')

<x-back-head>
    <x-slot name="pageName">
        Dashboard
    </x-slot>
</x-back-head>

        <section class="bg-white dark:bg-gray-800 pt-4">
            <div class="mx-auto px-6 md:px-2 md:flex  justify-around items-center">
                <div class="shadow-md py-6 px-10 rounded-lg">

                    <svg class="h-8 w-8 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">Membres</h1>

                    <div class="mt-3 grid md:grid-cols-4 sm:grid-cols-2 xs:grid-cols-1 gap-4">
                        <div class="px-4 py-2 text-2xl rounded-md bg-blue-200 text-blue-700">
                            {{ $nbMembers }}
                        </div>
                    </div>
                </div>

                <div class="shadow-md py-6 px-10 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">Réalisations
                    </h1>

                    <div class="mt-3 grid md:grid-cols-4 sm:grid-cols-2 xs:grid-cols-1 gap-4">
                        <div class="px-4 py-2 text-2xl rounded-md bg-green-200 text-green-700">
                            {{ $nbVachievements }}
                        </div>
                        <div class="px-4 py-2 text-2xl rounded-md bg-red-200 text-red-700">
                            {{ $nbNVachievements }}
                        </div>
                    </div>
                </div>

                <div class="shadow-md py-6 px-10 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">Feedback
                    </h1>

                    <div class="mt-3 grid md:grid-cols-4 sm:grid-cols-2 xs:grid-cols-1 gap-4">
                        <div class="animate-pulse px-4 py-2 text-2xl rounded-md bg-yellow-200 text-yellow-700">
                            {{ $nbNVUfeedback }}
                        </div>
                        <div class="px-4 py-2 text-2xl rounded-md bg-blue-200 text-blue-700">
                            {{ $nbAfeedback }}
                        </div>
                        <div class="px-4 py-2 text-2xl rounded-md bg-green-200 text-green-700">
                            {{ $nVAfeedback }}
                        </div>
                        <div class="px-4 py-2 text-2xl rounded-md bg-red-200 text-red-700">
                            {{ $nbRfeedback }}
                        </div>
                    </div>
                </div>
            </div>

    </section>

    </div>
    </div>

@endsection
