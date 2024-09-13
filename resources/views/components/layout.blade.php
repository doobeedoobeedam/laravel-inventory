<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📦</text></svg>">
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
                    
                    <x-alerts></x-alerts>
                
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
