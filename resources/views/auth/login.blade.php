<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('static/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <title>Sign In - Pawspital</title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeSlash = document.getElementById('eyeSlash');
            const eye = document.getElementById('eye');

            togglePassword.addEventListener('click', () => {
                if (password.type === 'password') {
                    password.type = 'text';
                    eyeSlash.classList.add('hidden');
                    eye.classList.remove('hidden');
                } else {
                    password.type = 'password';
                    eyeSlash.classList.remove('hidden');
                    eye.classList.add('hidden');
                }
            });
        });
    </script>
</head>

<body class="bg-gradient-to-r from-gray-500 to-yellow-700 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden flex w-full max-w-4xl">
        <div class="hidden lg:block w-1/2 bg-cover bg-center" style="background-image: url('/static/image-login.jpg');"></div>
        <div class="w-full lg:w-1/2 p-8">
            <div class="flex flex-col gap-2 justify-center items-center mb-8">
                <a href="/">
                    <img class="w-12 h-12 mr-2 bg-white rounded-full" src="{{ asset('static/logo.png') }}" alt="logo">
                </a>
                <span class="text-xl font-semibold mt-2">Welcome Back, Pawspital!</span>
                <span class="text-2xl mt-1 font-bold">Login</span>
            </div>
            @if (session('error'))
            <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
            <form action="{{ route('auth.login') }}" method="post" class="">
                @csrf
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 
                        sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                         dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="you@example.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                        <div class="relative">
                            <input type="password" value="{{ old('password') }}" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900
                            sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                            dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
                            <span id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer">
                                <svg id="eyeSlash" class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg id="eye" class="w-6 h-6 text-gray-800 dark:text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white hover:shadow-lg font-medium rounded-lg text-sm px-4 py-2 text-center dark:focus:ring-blue-800 transition duration-200 ease-in-out">
                        Sign In
                    </button>
                </div>
                <div class="flex flex-col gap-3 mt-6">
                    <p class="text-sm font-light text-center">
                        Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register here</a>
                    </p>

                    <div class="flex items-center justify-center text-center">
                        <hr class="border-gray-300 w-full">
                        <p class="text-sm font-light mx-2">
                            Atau
                        </p>
                        <hr class="border-gray-300 w-full">
                    </div>
                    <a href="{{ route('auth.google') }}" class="w-full flex bg-white justify-center items-center text-black hover:bg-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center transition duration-200 ease-in-out shadow-lg border border-gray-300">
                        <img src="{{ asset('static/icon-google.png') }}" alt="Google icon" class="w-6 h-6 mr-2">
                        Masuk dengan Google
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>