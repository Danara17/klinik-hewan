<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl h-full flex">
            <div class="hidden md:flex w-1/2 bg-cover bg-center rounded-l-lg" style="background-image: url('static/forgot-password.jpg');"></div>
            <div class="flex flex-col justify-between w-full md:w-1/2 p-8">
                <div>
                    <div class="flex justify-center mb-6">
                    </div>
                    <h2 class="text-2xl font-semibold mb-2">Forgot Password!</h2>
                    <p class="text-gray-600 mb-4">Masukkan email anda untuk reset password</p>

                    @if (session('status'))
                        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                            Kami sudah mengirimkan surel yang berisi tautan untuk mereset kata sandi.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-4 relative">
                            <label for="email" class="block text-gray-700">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    <svg class="w-6 h-6 text-black dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"/>
                                        <path d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"/>
                                    </svg>
                                </span>
                                <input type="email" class="form-control mt-1 block w-full border-black rounded-lg pl-12 py-3 shadow-lg focus:ring focus:ring-blue-200" id="email" name="email" placeholder="Masukkan email" required>
                            </div>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-600 w-full">Send Password Reset Link</button>
                    </form>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('auth.show.login') }}" class="text-blue-600 hover:underline flex items-center justify-center">
                        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke halaman login
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
