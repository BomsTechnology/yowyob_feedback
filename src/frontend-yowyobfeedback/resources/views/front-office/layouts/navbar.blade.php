<div x-data="{open : false, isDark : false, scrollAtTop : true, showModal : false}" class="bg-white ">
    <nav class="dark:bg-gray-800 border-t-4 border-indigo-500 bg-white fixed w-full z-40"
        x-bind:class="{ 'bg-gray-100 shadow-md' : !scrollAtTop  }"
        @scroll.window="scrollAtTop = (window.pageYOffset > 50) ? false : true">
        <button class="fixed bottom-20 md:right-8 z-40 right-5 border shadow-md p-1 rounded-md" x-show="!scrollAtTop">

            {{-- svg go to top --}}
            <a href="#yowyobfeedback">
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce h-8 w-8 text-indigo-500 dark:text-white" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>

            {{-- Svg plus --}}
            <svg xmlns="http://www.w3.org/2000/svg" @click=" showModal = true "
                class="h-8 w-8 text-indigo-500 block md:hidden dark:text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300">
                        <span class="text-indigo-500">Yowyob</span> Feedback
                    </h1>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button @click="open = !open" type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Pc View --}}
            <div class="items-center md:flex hidden">
                <div class="flex flex-col md:flex-row md:mx-6">
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#WiconetLabs">WiconetLabs</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Realisations">Nos Réalisations</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Membres">Membres</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Feedback">Feedback</a>
                    <a class="my-1 p-2 bg-indigo-500 flex rounded-md text-sm font-medium text-gray-100 dark:text-gray-200 hover:bg-indigo-700 hover:text-gray-200 dark:hover:text-gray-400 md:mx-4 md:my-0"
                        href="javascript:void(0)" @click=" showModal = true ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1">
                            New Feedback
                        </span>
                    </a>
                </div>

                <div class="flex justify-center cursor-pointer" onclick="darkMode()">
                    {{-- Moon svg --}}
                    <svg x-show="!isDark" @click=" isDark = true " xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 dark:text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>

                    {{-- Sun svg --}}
                    <svg x-show="isDark" @click=" isDark = false " xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 dark:text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            {{-- Mobile View --}}
            <div class="items-center md:hidden pt-2" x-show="open" x-transition>
                <div class="flex flex-col">
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#WiconetLabs">WiconetLabs</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Realisations">Nos Réalisations</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Membres">Membres</a>
                    <a class="my-1 p-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0"
                        href="#Feedback">Feedback</a>
                    <a class="my-1 p-2 bg-indigo-500 flex rounded-md text-sm font-medium text-gray-100 dark:text-gray-200 hover:bg-indigo-700 hover:text-gray-200 dark:hover:text-gray-400 md:mx-4 md:my-0"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1">
                            New Feedback
                        </span>
                    </a>
                </div>

                <div class="flex justify-center md:hidden cursor-pointer" onclick="darkMode()">

                    {{-- Moon svg --}}
                    <svg x-show="!isDark" @click=" isDark = true " xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 dark:text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>

                    {{-- Sun svg --}}
                    <svg x-show="isDark" @click=" isDark = false " xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 dark:text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </nav>
    <x-feedback-modal>
    </x-feedback-modal>
</div>
