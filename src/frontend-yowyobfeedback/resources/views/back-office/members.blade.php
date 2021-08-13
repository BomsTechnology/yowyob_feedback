@extends('back-office.layouts.app')

@section('content')

    <x-back-head>
        <x-slot name="pageName">
            Membres
        </x-slot>
    </x-back-head>

    <div x-data="{showModal : false}">
        <button @click=" showModal = true "
            class="px-4 md:absolute right-8 top-24 flex py-2 md:mt-0 mt-5 md:ml-0 ml-5 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-gray-800 hover:bg-blue-700 dark:hover:bg-gray-700 focus:outline-none focus:bg-indigo-500 dark:focus:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd" />
            </svg>
            <span class="ml-2"> Ajouter </span>
        </button>
        <x-members-modal>
        </x-members-modal>
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
                                        @if (Session::get('statusMember') == 1)
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                    @forelse ($members as $member)
                                    @if ($member->id != Session::get('idMember'))
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                            src="{{ Storage::url($member->image) }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $member->name }} {{ $member->firstname }}
                                                        </div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-200">
                                                            {{ $member->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    {{ $member->job }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($member->admin == 1)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Admin
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        Membre
                                                    </span>
                                                @endif

                                            </td >
                                            @if (Session::get('statusMember') == 1)
                                                <td class="px-6 py-4 flex whitespace-nowrap text-right text-sm font-medium" x-data="{showModal : false}">
                                                    @if ($member->admin != 0)
                                                    <a href="{{ route('member.noadmin', ['id' => $member->id]) }}"
                                                        title="Refuser" class="text-pink-600 mx-1 hover:text-pink-900">
                                                        removeAdmin
                                                    </a>
                                                    @endif
                                                    @if ($member->admin != 1)
                                                    <a href="{{ route('member.admin', ['id' => $member->id]) }}"
                                                        title="Valider" class="text-green-600 mx-1 hover:text-green-900">
                                                        passAdmin
                                                    </a>
                                                    @endif
                                                    <a href="#" @click=" showModal = true "
                                                        title="supprimer" class="text-red-600 mx-1 hover:text-red-900">
                                                        Delete
                                                    </a>
                                                    <x-confirm>
                                                        <x-slot name="route">
                                                            {{ route('member.delete', ['id' => $member->id]) }}
                                                        </x-slot>
                                                    </x-confirm>
                                                </td>
                                            @endif
                                        </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-xl font-semibold text-gray-500 dark:text-gray-200 text-center"
                                                colspan="5">Pas de Membres</td>
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
