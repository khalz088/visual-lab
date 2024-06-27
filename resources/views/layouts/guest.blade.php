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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="grid grid-cols-1 sm:grid-cols-2">
        <div>
            <img class="hidden sm:flex min-h-screen " src="{{asset('welcome.jpg')}}">

        </div>

        <div class="min-h-screen flex flex-col sm:justify-center  items-center sm:pt-0 ">


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white  shadow-xl overflow-hidden sm:rounded-lg">
                <div class="justify-center flex mb-4">
                    <a href="/" >
                        <img src="{{asset("atc logo.png")}}" class="w-20 h-20 fill-current ">
                    </a>
                </div>

                <p class="text-center font-serif font-semibold ">ATC - Virtual Labs</p>
                {{ $slot }}
            </div>
        </div>
    </div>
    </body>
</html>
