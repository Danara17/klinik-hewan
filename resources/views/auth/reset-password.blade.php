<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .input-placeholder::placeholder {
            padding-left: 1rem;
        }
        .input-padding {
            padding-left: 1rem;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.toggle-password').forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const input = document.getElementById(toggle.dataset.target);
                    input.type = input.type === 'password' ? 'text' : 'password';
                    toggle.innerHTML = input.type === 'password' ? 
                        '<svg class="w-6 h-6 text-gray-800 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>' : 
                        '<svg class="w-6 h-6 text-gray-800 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>';
                });
            });
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl flex">
            <div class="hidden md:block w-1/2 bg-cover bg-center rounded-l-lg" style="background-image: url('{{ asset('static/reset-password.jpg') }}');"></div>
            <div class="w-full md:w-1/2 p-8">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('static/logo.png') }}" alt="Logo" class="h-16 w-16">
                </div>
                <h2 class="text-2xl font-semibold mb-4">Reset Password!</h2>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4 relative">
                        <label for="email" class="block text-gray-700">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"/>
                                    <path d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"/>
                                </svg>
                            </span>
                            <input type="email" class="form-control mt-1 block w-full border-black rounded-lg pl-12 py-3 shadow-lg focus:ring focus:ring-blue-200 input-placeholder" id="email" name="email" value="{{ $email ?? old('email') }}" required>
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 relative">
                        <label for="password" class="block text-gray-700">Password</label>
                        <div class="relative">
                            <input type="password" class="form-control mt-1 block w-full border-black rounded-lg py-3 shadow-lg focus:ring focus:ring-blue-200 pr-10 input-placeholder input-padding" id="password" name="password" placeholder="Enter your password" required>
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer toggle-password" data-target="password">
                                <svg class="w-6 h-6 text-gray-800 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            </span>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 relative">
                        <label for="password-confirm" class="block text-gray-700">Confirm Password</label>
                        <div class="relative">
                            <input type="password" class="form-control mt-1 block w-full border-black rounded-lg py-3 shadow-lg focus:ring focus:ring-blue-200 pr-10 input-placeholder input-padding" id="password-confirm" name="password_confirmation" placeholder="Confirm your password" required>
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer toggle-password" data-target="password-confirm">
                                <svg class="w-6 h-6 text-gray-800 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-600 w-full">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
