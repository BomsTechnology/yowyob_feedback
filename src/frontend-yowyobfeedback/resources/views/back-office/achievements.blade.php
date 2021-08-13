@extends('back-office.layouts.app')

@section('content')

    <x-back-head>
        <x-slot name="pageName">
            Réalisations
        </x-slot>
    </x-back-head>

    <div x-data="{showAchiement : false}">
        <button @click=" showAchiement = true "
            class="px-4 md:absolute right-8 top-24 flex py-2 md:mt-0 mt-5 md:ml-0 ml-5 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-gray-800 hover:bg-blue-700 dark:hover:bg-gray-700 focus:outline-none focus:bg-indigo-500 dark:focus:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd" />
            </svg>
            <span class="ml-2"> Ajouter </span>
        </button>
        <x-achievements-modal>
        </x-achievements-modal>
    </div>

    <section class="bg-white dark:bg-gray-800 flex-shrink md:mt-16 mt-5 max-w-full">
        <x-sub-success />
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col flex-shrink">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 flex-shrink">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Link
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                    @forelse ($achievements as $achievement)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="@if ($achievement->image == '') {{ asset('images/logo2.png') }}
                                                        @else{{ Storage::url($achievement->image) }} @endif"
                                                        alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $achievement->title }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    <a href="{{ $achievement->link }}"
                                                        class="hover:underline">{{ $achievement->link }}</a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    {{ $achievement->description }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($achievement->state)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Validé
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Non Validé
                                                    </span>
                                                @endif

                                            </td>

                                            <td class="px-6 py-4 flex whitespace-nowrap text-right text-sm font-medium"
                                                x-data="{showModal : false, showAchiement : false}">
                                                <a href="#" @click=" showAchiement = true "
                                                    title="Refuser" class="text-blue-600 mx-1 hover:text-blue-900">
                                                    Editer
                                                </a>
                                                <x-achievements-modal>
                                                    <x-slot name="id">
                                                        {{ $achievement->id }}
                                                    </x-slot>
                                                </x-achievements-modal>
                                                @if (Session::get('statusMember') == 1)
                                                    @if ($achievement->state)
                                                        <a href="{{ route('achievement.novalid', ['id' => $achievement->id]) }}"
                                                            title="Refuser" class="text-pink-600 mx-1 hover:text-pink-900">
                                                            refuser
                                                        </a>
                                                    @endif
                                                    @if (!$achievement->state)
                                                        <a href="{{ route('achievement.valid', ['id' => $achievement->id]) }}"
                                                            title="Valider"
                                                            class="text-green-600 mx-1 hover:text-green-900">
                                                            valider
                                                        </a>
                                                    @endif
                                                    <a href="#" @click=" showModal = true " title="supprimer"
                                                        class="text-red-600 mx-1 hover:text-red-900">
                                                        Delete
                                                    </a>
                                                    <x-confirm>
                                                        <x-slot name="route">
                                                            {{ route('achievement.delete', ['id' => $achievement->id]) }}
                                                        </x-slot>
                                                    </x-confirm>
                                                @endif
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-xl font-semibold text-gray-500 dark:text-gray-200 text-center"
                                                colspan="5">Pas de Réalisations</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    </div>
    </div>

@endsection
