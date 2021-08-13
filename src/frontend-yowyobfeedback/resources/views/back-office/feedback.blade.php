@extends('back-office.layouts.app')

@section('content')

    <x-back-head>
        <x-slot name="pageName">
            Feedback
        </x-slot>
    </x-back-head>

    <section class="bg-white dark:bg-gray-800 mt-10">
        <x-sub-success />
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col flex-shrink">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 flex-shrink">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Job
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                            Commments
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                    @forelse ($feedbacks as $feedback)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ Storage::url($feedback->image) }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $feedback->name }} {{ $feedback->firstname }}
                                                        </div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-200">
                                                            {{ $feedback->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    {{ $feedback->job }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($feedback->state == 1)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Approuvé
                                                    </span>
                                                @elseif ($feedback->state == 0)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Réfusé
                                                    </span>
                                                @elseif ($feedback->state == 2)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        En Attente
                                                    </span>
                                                @else
                                                    <span
                                                        class="animate-pulse px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Non Vu
                                                    </span>
                                                @endif

                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-200">
                                                {{ $feedback->comments }}

                                            </td>
                                            <td class="px-6 py-4 flex whitespace-nowrap text-right text-sm font-medium"
                                                x-data="{showModal : false}">
                                                @if ($feedback->state != 0)
                                                    <a href="{{ route('feedback.novalid', ['id' => $feedback->id]) }}"
                                                        title="Refuser" class="text-pink-600 mx-1 hover:text-pink-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                @if ($feedback->state != 1)
                                                    <a href="{{ route('feedback.valid', ['id' => $feedback->id]) }}"
                                                        title="Valider" class="text-green-600 mx-1 hover:text-green-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                @if ($feedback->state != 2)
                                                    <a href="{{ route('feedback.waiting', ['id' => $feedback->id]) }}"
                                                        title="En Attente" class="text-blue-600 mx-1 hover:text-blue-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                <a href="#" @click=" showModal = true " title="supprimer"
                                                    class="text-red-600 mx-1 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <x-confirm>
                                                    <x-slot name="route">
                                                        {{ route('feedback.delete', ['id' => $feedback->id]) }}
                                                    </x-slot>
                                                </x-confirm>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-xl font-semibold text-gray-500 dark:text-gray-200 text-center"
                                                colspan="5">Pas de Commentaire</td>
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
