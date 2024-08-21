<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            Inventory
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->is('/'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('/') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('users', 'users/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('users/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/users">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                    </svg>
                    <span class="ml-4">Users</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('suppliers', 'suppliers/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('suppliers', 'suppliers/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/suppliers">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                    <span class="ml-4">Suppliers</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('items'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('items') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/items">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                    </svg>
                    <span class="ml-4">Items</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('items/incoming', 'items/incoming/*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('items/incoming', 'items/incoming/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/items/incoming">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181"></path>
                    </svg>
                    <span class="ml-4">Incoming Items</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('items/outgoing', 'items/outgoing/*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('items/outgoing', 'items/outgoing/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/items/outgoing">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"></path>
                    </svg>
                    <span class="ml-4">Outgoing Items</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('stocks', 'stocks/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('stocks', 'stocks/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/stocks">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"></path>
                    </svg>
                    <span class="ml-4">Stocks</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Inventory
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->is('/'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('/') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('users/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('users/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/users">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                    </svg>
                    <span class="ml-4">Users</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('stocks/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('stocks/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="cards.html">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"></path>
                    </svg>
                    <span class="ml-4">Stock</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('suppliers/*'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('suppliers/*') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/suppliers">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                    <span class="ml-4">Suppliers</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('items'))
                <span class="absolute inset-y-0 left-0 w-1 bg-teal-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-500 {{ request()->is('items') ? 'text-gray-800 dark:text-gray-200' : '' }}" href="/items">
                    <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"></path>
                    </svg>
                    <span class="ml-4">Items</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
