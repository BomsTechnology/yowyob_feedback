<header class="bg-white dark:bg-gray-800" x-data="{showModal : false}" id="yowyobfeedback">

    @include('front-office.layouts.navbar')

    <div class="container px-6 py-16 mx-auto">
        <div class="items-center lg:flex mt-19">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white lg:text-3xl">Laissez - nous un<span
                            class="text-indigo-500"> commentaire</span></h1>

                    <p class="mt-4 text-gray-600 dark:text-gray-400">De votre passage au laboratoire<span
                            class="font-medium text-indigo-500"> WiconetLabs</span> 😉</p>

                    <div class="mt-8">
                        <button type="button" @click=" showModal = true "
                            class="flex px-4 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md w-auto hover:bg-indigo-400 focus:outline-none focus:bg-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-1">
                               NEW FEEDBACK
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                <img class="w-full h-full max-w-md" src="{{ asset('images/mailsvg.svg') }}" alt="#">
            </div>
        </div>
    </div>
    <x-feedback-modal>
    </x-feedback-modal>
</header>
