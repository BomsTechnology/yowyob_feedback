<div class="flex relative" x-data="{isDark : false, open : true}">
    <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600 flex-shrink-0"
        x-show="open">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white"><span class="text-indigo-500">Yowyob</span>
            Feedback</h2>

            <a href="{{ route('members.logout') }}" class="mt-4 p-2 bg-indigo-500 text-white text-center rounded-md"> Se deconnecter </a>

        <hr class="my-6 dark:border-gray-600" />
        <div class="flex flex-col justify-between flex-1 mt-1">
            <nav>
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) class="flex items-center px-4 py-2 text-gray-700 bg-indigo-300 rounded-md dark:bg-gray-700 dark:text-gray-200" @else class="flex items-center px-4 py-2  text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" @endif>
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <a @if (request()->routeIs('members.index')) class="flex items-center px-4 py-2 mt-5 text-gray-700 bg-indigo-300 rounded-md dark:bg-gray-700 dark:text-gray-200" @else class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" @endif href="{{ route('members.index') }}">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Membres</span>
                </a>

                <a @if (request()->routeIs('achievements.index')) class="flex items-center px-4 py-2 mt-5 text-gray-700 bg-indigo-300 rounded-md dark:bg-gray-700 dark:text-gray-200" @else class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" @endif href="{{ route('achievements.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>

                    <span class="mx-4 font-medium">Réalisations</span>
                </a>

                <a @if (request()->routeIs('feedback.index')) class="flex items-center relative px-4 py-2 mt-5 text-gray-700 bg-indigo-300 rounded-md dark:bg-gray-700 dark:text-gray-200" @else class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" @endif href="{{ route('feedback.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>

                    <span class="mx-4 font-medium">Feedback</span>

                    {{-- <span class="animate-pulse px-2 py-0.5 rounded-lg bg-yellow-200 text-yellow-700 absolute right-5">
                        5
                    </span> --}}
                </a>

                <hr class="my-6 dark:border-gray-600" />

                <a @if (request()->routeIs('settings')) class="flex items-center px-4 py-2 text-gray-700 bg-indigo-300 rounded-md dark:bg-gray-700 dark:text-gray-200" @else class="flex items-center px-4 py-2  text-gray-600 transition-colors duration-200 transform rounded-md dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-gray-200 hover:text-gray-700" @endif
                    href="{{ route('settings') }}">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Settings</span>
                </a>
            </nav>

            <div class="flex items-center px-4 -mx-2">
                <img class="object-cover mx-2 rounded-full h-9 w-9"
                    src="{{ Storage::url(Session::get('imageMember')) }}"
                    alt="avatar" />
                <h4 class="mx-2 font-medium text-gray-800 dark:text-gray-200 hover:underline">{{ Session::get('nameMember') }} {{ Session::get('firstnameMember') }}</h4>
                <div class="flex justify-center cursor-pointer items-center ml-2" onclick="darkMode()">
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
        <button @click="open= false" type="button"
            class="text-gray-500 z-50 absolute top-9 left-56 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
            aria-label="toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <button @click="open= true" x-show="!open" type="button"
        class="z-50 absolute top-7 left-4 text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
        aria-label="toggle menu">
        <svg viewBox="0 0 24 24" class="w-7 h-7 fill-current">
            <path fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
            </path>
        </svg>
    </button>
    <div class="flex-grow dark:bg-gray-800 relative">
