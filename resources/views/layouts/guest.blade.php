<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @wireUiScripts
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-bl from-main to-gray-300">


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-xl overflow-hidden sm:rounded-2xl">
            <div class="flex justify-center mt-5">
                <a class="text-lg tracking-tight flex space-x-3 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                    href="/">
                    <x-shared.logo class="h-16" />
                    <div>
                        <h1 class="font-bold text-2xl text-main">LAUNDRY</h1>
                        <h1 class="font-bold text-sm leading-3 text-main/70">Booking System</h1>
                    </div>
                </a>
            </div>
            <div class="mt-10">
                {{ $slot }}
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
