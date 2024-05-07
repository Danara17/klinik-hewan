<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>403 Unauthorized | Pawspital</title>
</head>

<body class="h-screen flex justify-center items-center">
    <div class="text-center">
        <img src="{{ asset('static/403.jpg') }}" alt="Hayo Mau Kemana kamu" class="mx-auto mb-4" style="width: 300px;">
        <h1 class="text-3xl font-bold text-red-600">403 Unauthorized</h1>
        <p class="text-gray-600">Hayoooo mau kemana balik sana.</p>
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <button type="submit" class="text-blue-600 hover:text-blue-400">back</button>
        </form>
    </div>
</body>

</html>
