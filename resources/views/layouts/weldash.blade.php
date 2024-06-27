<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans">
<div class="px-4 py-2 shadow-lg w-full mx-auto  md:px-24 lg:px-8">
    <div class="relative flex items-center justify-between">
        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
            <img src="{{asset("atc logo.png")}}" class="w-12 h-12 fill-current ">
        </a>
        <div>
            <x-nav-link :href="route('wel')" :active="request()->routeIs('wel')">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link class="ml-4" :href="route('labs')" :active="request()->routeIs('labs')" wire:navigate>
                {{ __('Labs') }}
            </x-nav-link>
        </div>
        <ul class="flex items-center hidden space-x-8 lg:flex">
            @if(auth()->user())
            <li>
                <a
                    href="{{route('dashboard')}}"
                    class="inline-flex items-center bg-green-700 text-white  hover:border-green-700 hover:border-2 shadow-sm hover:text-green-800 hover:bg-white justify-center w-full h-12 px-6 font-medium tracking-wide  transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                    aria-label="Dashboard"
                    title="Dashboard"
                >
                    Dashboard
                </a>
            </li>
            @else
                <li>
                    <a
                        href="{{route('login')}}"
                        class="inline-flex items-center bg-green-700 text-white  hover:border-green-700 hover:border-2 shadow-sm hover:text-green-800 hover:bg-white justify-center w-full h-12 px-6 font-medium tracking-wide  transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                        aria-label="Sign up"
                        title="Sign up"
                    >
                        Login
                    </a>
                </li>
            @endif
        </ul>
        <!-- Mobile menu -->
        <div class="lg:hidden">
            <button aria-label="Open Menu" title="Open Menu" class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50">
                <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                    <path fill="currentColor" d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                    <path fill="currentColor" d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                </svg>
            </button>
            <!-- Mobile menu dropdown -->
            <div  id="mobile-menu-dropdown" class=" hidden absolute top-0 left-0 w-full">
              <div class="p-5 bg-white border rounded shadow-sm">
                <div class="flex items-center justify-between mb-4">
                  <div>
                    <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                        <img src="{{asset("atc logo.png")}}" class="w-12 h-12 fill-current ">
                    </a>
                  </div>
                  <div>
                    <button aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path
                          fill="currentColor"
                          d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <nav>
                  <ul class="space-y-4">
                      @if(auth()->user())
                          <li>
                              <a
                                  href="{{route('dashboard')}}"
                                  class="inline-flex items-center bg-green-700 text-white  hover:border-green-700 hover:border-2 shadow-sm hover:text-green-800 hover:bg-white justify-center w-full h-12 px-6 font-medium tracking-wide  transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                  aria-label="Dashboard"
                                  title="Dashboard"
                              >
                                  Dashboard
                              </a>
                          </li>
                      @else
                          <li>
                              <a
                                  href="{{route('login')}}"
                                  class="inline-flex items-center bg-green-700 text-white  hover:border-green-700 hover:border-2 shadow-sm hover:text-green-800 hover:bg-white justify-center w-full h-12 px-6 font-medium tracking-wide  transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                  aria-label="Sign up"
                                  title="Sign up"
                              >
                                  Login
                              </a>
                          </li>
                      @endif

                  </ul>
                </nav>
              </div>
            </div>

        </div>
    </div>
</div>
{{ $slot }}
</body>
</html>
