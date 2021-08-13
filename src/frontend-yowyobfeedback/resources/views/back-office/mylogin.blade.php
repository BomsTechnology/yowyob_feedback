<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yowyob - FeedBack</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" type="image/jng" href="{{ asset('images/logo2.png') }}">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>

    <div class="h-screen flex justify-center items-center">

        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-6 py-4">
                <h2 class="text-3xl font-bold text-center text-gray-700 dark:text-white"><span class="text-indigo-500">Yowyob</span>
                    Feedback</h2>

                <h3 class="mt-1 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome To the Back Office</h3>

                <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login</p>
                <x-myerror />
                <form method="POST" action="{{ route('members.login') }}">
                    @csrf
                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="email" placeholder="Email Address" aria-label="Email Address" required name="email">
                    </div>

                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="password" placeholder="Password" aria-label="Password" required name="password">
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button
                            class="px-4 py-2 w-full leading-5 text-white transition-colors duration-200 transform bg-indigo-700 rounded hover:bg-indigo-600 focus:outline-none"
                            type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
