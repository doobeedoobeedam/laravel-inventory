<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://fav.farm/📦" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="{{ asset('assets/js/alpine.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script src="{{ asset('assets/js/focus-trap.js') }}"></script>
    <title>{{ $title }} | Inventory</title>
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <x-sidebar></x-sidebar>
        <div class="flex flex-col flex-1 w-full">
            <x-navbar></x-navbar>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    
                    @if (session('success'))
                        <div id="alert" class="absolute mt-4 mr-6 top-4 right-0 flex items-center p-4 mb-6 text-sm font-semibold text-white bg-teal-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-teal">
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" data-slot="icon" fill="none" stroke-width="5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path>
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                            <button onclick="dismissAlert()">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
