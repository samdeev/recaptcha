<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google reCaptcha</title>

    {{--Fonts--}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{--Vite--}}
    @vite(resource_path('/css/app.css'))
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen max-w-5xl flex justify-center items-center mx-auto">
        <div class="max-w-[30rem] w-full bg-white border border-gray-200 p-6 shadow rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
