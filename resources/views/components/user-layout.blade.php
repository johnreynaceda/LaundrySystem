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

<body class="font-sans antialiased">
    <div>

        <div class="w-full mx-auto   2xl:max-w-7xl">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-5 mx-auto bg-main rounded-b-3xl shadow-xl  md:items-center md:justify-between md:flex-row md:px-6 lg:px-10">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-lg tracking-tight flex space-x-3 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <x-shared.logo class="h-16" />
                        <div>
                            <h1 class="font-bold text-2xl text-white">LAUNDRY</h1>
                            <h1 class="font-bold text-sm leading-3 text-gray-200">Booking System</h1>
                        </div>
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">



                    <div class="inline-flex items-center gap-7 text-white list-none">
                        @if (auth()->check())
                            @if (auth()->user()->is_admin == false)
                                <a class="hover:text-gray-300" href="{{ route('user.dashboard') }}">HOME</a>
                            @else
                                <a class="hover:text-gray-300" href="{{ route('welcome') }}">HOME</a>
                            @endif
                        @else
                            <a class="hover:text-gray-300" href="{{ route('welcome') }}">HOME</a>
                        @endif
                        <a class="hover:text-gray-300" href="{{ route('about') }}">ABOUT</a>
                        <a class="hover:text-gray-300" href="{{ route('pricing') }}">PRICING</a>
                        @if (auth()->check())
                            <a class="hover:text-gray-300" href="{{ route('user.booking') }}">MY BOOKING
                                ({{ \App\Models\Booking::where('user_id', auth()->user()->id)->count() }})</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="flex items-center border p-2 rounded space-x-2">
                                    <span class="uppercase">{{ auth()->user()->name }}</span>
                                    <x-button href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                                        icon="logout" xs class="text-white hover:text-main font-medium" />
                                </div>
                            </form>
                        @else
                            <x-button label="SIGN IN" href="{{ route('login') }}"
                                class="text-white hover:text-main font-medium" />
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <section>
            {{ $slot }}
        </section>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
