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

<body class="font-sans antialiased bg-gradient-to-bl from-main to-gray-300">

    <div class="flex h-screen overflow-hidden ">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-main ">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg tracking-tight flex space-x-3 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                            href="/">
                            <x-shared.logo class="h-16" />
                            <div>
                                <h1 class="font-bold text-2xl text-white">LAUNDRY</h1>
                                <h1 class="font-bold text-sm leading-3 text-gray-200">Booking System</h1>
                            </div>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-10">
                        <nav class="flex-1 space-y-1 ">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                MENU
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 text-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.dashboard') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M19.14 20.25c-.19 0-.38-.07-.53-.21-.3-.29-.3-.76-.01-1.06a9.188 9.188 0 002.65-6.48c0-5.1-4.15-9.25-9.25-9.25S2.75 7.4 2.75 12.5c0 2.43.93 4.72 2.63 6.46.29.3.28.77-.01 1.06-.3.29-.77.28-1.06-.01a10.709 10.709 0 01-3.06-7.51C1.25 6.57 6.07 1.75 12 1.75S22.75 6.57 22.75 12.5c0 2.83-1.09 5.51-3.08 7.53-.14.15-.34.22-.53.22z">
                                            </path>
                                            <path
                                                d="M12 21.998a3.88 3.88 0 100-7.76 3.88 3.88 0 000 7.76zM16 8.5c-1.1 0-2 .9-2 2v.75c0 .69.56 1.25 1.25 1.25H16c1.1 0 2-.9 2-2s-.9-2-2-2z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class=" {{ request()->routeIs('admin.services') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 font-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.services') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-width="1.5"
                                                d="M2 7.85c0-1.85.99-2 2.22-2h15.56c1.23 0 2.22.15 2.22 2 0 2.15-.99 2-2.22 2H4.22C2.99 9.85 2 10 2 7.85z">
                                            </path>
                                            <g stroke-linecap="round" stroke-width="1.5" opacity=".4">
                                                <path stroke-linejoin="round" stroke-miterlimit="10"
                                                    d="M8.81 2L5.19 5.63M15.19 2l3.62 3.63"></path>
                                                <path d="M9.76 14v3.55M14.36 14v3.55"></path>
                                            </g>
                                            <path stroke-linecap="round" stroke-width="1.5"
                                                d="M3.5 10l1.41 8.64C5.23 20.58 6 22 8.86 22h6.03c3.11 0 3.57-1.36 3.93-3.24L20.5 10">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Services
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class=" {{ request()->routeIs('admin.sales') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 font-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.sales') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9.5 13.75c0 .97.75 1.75 1.67 1.75h1.88c.8 0 1.45-.68 1.45-1.53 0-.91-.4-1.24-.99-1.45l-3.01-1.05c-.59-.21-.99-.53-.99-1.45 0-.84.65-1.53 1.45-1.53h1.88c.92 0 1.67.78 1.67 1.75M12 7.5v9">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M22 12c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2M22 6V2h-4M17 7l5-5">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Sales
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class=" {{ request()->routeIs('admin.customers') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 font-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.customers') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M12 12.75c-3.17 0-5.75-2.58-5.75-5.75S8.83 1.25 12 1.25 17.75 3.83 17.75 7s-2.58 5.75-5.75 5.75zm0-10A4.26 4.26 0 007.75 7 4.26 4.26 0 0012 11.25 4.26 4.26 0 0016.25 7 4.26 4.26 0 0012 2.75zM3.41 22.75c-.41 0-.75-.34-.75-.75 0-4.27 4.19-7.75 9.34-7.75 1.01 0 2 .13 2.96.4.4.11.63.52.52.92-.11.4-.52.63-.92.52-.82-.23-1.68-.34-2.56-.34-4.32 0-7.84 2.8-7.84 6.25 0 .41-.34.75-.75.75z">
                                            </path>
                                            <path
                                                d="M18 22.75a4.7 4.7 0 01-3.17-1.23c-.35-.3-.66-.67-.9-1.08-.44-.72-.68-1.57-.68-2.44 0-1.25.48-2.42 1.34-3.31.9-.93 2.11-1.44 3.41-1.44 1.36 0 2.65.58 3.53 1.58A4.74 4.74 0 0122.75 18c0 .38-.05.76-.15 1.12-.1.45-.29.92-.55 1.33-.83 1.42-2.39 2.3-4.05 2.3zm0-8a3.241 3.241 0 00-2.78 4.92c.16.28.37.53.61.74.6.55 1.37.85 2.17.85 1.13 0 2.2-.6 2.78-1.57.17-.28.3-.6.37-.91.07-.26.1-.51.1-.77 0-.8-.3-1.57-.84-2.17-.6-.7-1.48-1.09-2.41-1.09z">
                                            </path>
                                            <path
                                                d="M19.5 18.73h-2.99c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h2.99c.41 0 .75.34.75.75s-.34.75-.75.75z">
                                            </path>
                                            <path
                                                d="M18 20.26c-.41 0-.75-.34-.75-.75v-2.99c0-.41.34-.75.75-.75s.75.34.75.75v2.99c0 .42-.34.75-.75.75z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Customers
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.status') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 font-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.status') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M2 11a9 9 0 019-9M20 11a9 9 0 01-17.08 3.97M14 5h6M14 8h3M19.071 20.97c.53 1.6 1.74 1.76 2.67.36.86-1.28.3-2.33-1.24-2.33-1.15 0-1.79.89-1.43 1.97z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Status
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a class=" {{ request()->routeIs('admin.report') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2.5 mt-1 font-medium  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                        href="{{ route('admin.report') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M21.66 10.44l-.98 4.18c-.84 3.61-2.5 5.07-5.62 4.77-.5-.04-1.04-.13-1.62-.27l-1.68-.4c-4.17-.99-5.46-3.05-4.48-7.23l.98-4.19c.2-.85.44-1.59.74-2.2 1.17-2.42 3.16-3.07 6.5-2.28l1.67.39c4.19.98 5.47 3.05 4.49 7.23z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15.06 19.39c-.62.42-1.4.77-2.35 1.08l-1.58.52c-3.97 1.28-6.06.21-7.35-3.76L2.5 13.28c-1.28-3.97-.22-6.07 3.75-7.35l1.58-.52c.41-.13.8-.24 1.17-.31-.3.61-.54 1.35-.74 2.2l-.98 4.19c-.98 4.18.31 6.24 4.48 7.23l1.68.4c.58.14 1.12.23 1.62.27zM12.64 8.53l4.85 1.23M11.66 12.4l2.9.74">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Reports
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="pt-10">
                                <form form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2.5 mt-1 text-medium text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main"
                                            href="route('logout')"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M8.9 7.56c.31-3.6 2.16-5.07 6.21-5.07h.13c4.47 0 6.26 1.79 6.26 6.26v6.52c0 4.47-1.79 6.26-6.26 6.26h-.13c-4.02 0-5.87-1.45-6.2-4.99M15 12H3.62M5.85 8.65L2.5 12l3.35 3.35">
                                                </path>
                                            </svg>
                                            <span class="ml-4">
                                                Logout
                                            </span>
                                        </a>
                                    </li>
                                </form>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 relative overflow-hidden">
            <main class="relative flex-1 mb-14 overflow-y-auto focus:outline-none">
                <div class="py-10">
                    <div class="px-4 mx-auto sm:px-6 md:px-40">
                        <header>
                            <h1 class="text-2xl font-bold uppercase leading-6 text-white">
                                @yield('title')
                            </h1>
                        </header>
                        <div class="mt-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
            <div class="absolute bottom-0 left-0 bg-white py-5 w-full">
                <div class="flex justify-end pr-10">
                    <span class="font-bold text-main">WELLMADE LAUNDRY SHOP</span>
                </div>
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
