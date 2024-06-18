<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('static/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <title>Sign In - Pawspital </title>
</head>

<body>
    <div class="flex min-h-screen min-w-full">
        <div class="hidden w-3/4  md:flex items-center justify-center bg-cover bg-center bg-no-repeat bg-[url('/static/ada.jpg')]">
        </div>
        <div class=" w-full lg:w-1/3 flex items-center justify-start">
            <div class="p-8 w-full">

                @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ session('error') }}!</span> Harap coba lagi
                </div>
                @endif

                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class=" flex flex-col gap-2 justify-center items-center">
                            <img class="w-8 h-8 mr-2  bg-white rounded-full" src="{{ asset('static/logo.png') }}" alt="logo">
                            <span class="text-l ">Pawspital</span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                @error('name')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" value="{{ old('email') }}" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                @error('email')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                @error('password')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    password</label>
                                <input type="password" name="password_confirmation" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the
                                        <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 
                            text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200 ease-in-out">
                                Register
                            </button>

                            <div class="flex items-center justify-center text-center">
                                <hr class="border-gray-300 w-full">
                                <p class="text-sm font-light  mx-2">
                                    Atau
                                </p>
                                <hr class="border-gray-300 w-full">
                            </div>
                            <a href="{{ route('auth.google') }}" class="w-full flex bg-white  justify-center items-center text-black hover:bg-blue-600 hover:text-white font-medium rounded-lg text-sm px-4 py-2 text-center transition duration-200 ease-in-out shadow-lg ">
                                <img src="{{ asset('static/icon-google.png') }}" alt="Google icon" class="w-6 h-6 mr-2">
                                Masuk dengan Google
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>