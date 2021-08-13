@extends('back-office.layouts.app')

@section('content')

    <x-back-head>
        <x-slot name="pageName">
            Settings
        </x-slot>
    </x-back-head>

    <section class="bg-white dark:bg-gray-800 pt-4">
        <form action="{{ route('members.update', ['id' => Session::get('idMember')]) }}" method="post"
            enctype="multipart/form-data" class="w-full">
            @method('put')
            @csrf
            <div class="mt-6 mx-auto px-32">
                <x-sub-success />

                {{-- Message for change password --}}
                @if (Session::get('passwordMember') == sha1("1234"))

                    <div
                        class="alert flex flex-row items-center bg-yellow-200 p-4 rounded border-b-2 border-yellow-300 py-1 mb-4">
                        <div
                            class="alert-icon flex items-center bg-yellow-100 border-2 border-yellow-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-yellow-500">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="alert-content ml-4">
                            <div class="alert-description text-sm text-yellow-600">
                                Vous devez changer votre mot de passe, avant de continuer : )
                            </div>
                        </div>
                    </div>

                @endif
                {{-- end Message for change password --}}

                <div class="items-center -mx-2 md:flex">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Name</label>

                        <input
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" name="name" required value="{{ Session::get('nameMember') }}">
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Prénom</label>

                        <input
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" name="firstname" required value="{{ Session::get('firstnameMember') }}">
                    </div>
                </div>

                <div class="items-center -mx-2 md:flex mt-4 md:mt-2">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Job</label>

                        <input
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" name="job" required value="{{ Session::get('jobMember') }}">
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-2">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">E-mail</label>

                        <input
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="email" name="email" required value="{{ Session::get('emailMember') }}">
                    </div>
                </div>

                <div class="w-full mx-2 mt-4 md:mt-2">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Password</label>

                    <input
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="password" name="password">
                </div>

                <div class="w-full mx-2 mt-4 md:mt-2">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Image</label>

                    <input
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        type="file" name="image">
                </div>
                <div class="bg-gray-50 px-2 py-3 mt-2 sm:px-6 sm:flex sm:flex-row-reverse dark:bg-gray-800">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Modifier
                    </button>
                    <button type="reset"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>

            </div>
        </form>

    </section>

    </div>
    </div>

@endsection
