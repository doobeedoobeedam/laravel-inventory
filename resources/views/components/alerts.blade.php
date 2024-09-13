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

@if (session('error'))
<div id="alert" class="absolute mt-4 mr-6 top-4 right-0 flex items-center p-4 mb-6 text-sm font-semibold text-white bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-teal">
    <div class="flex items-center mr-4">
        <svg class="w-5 h-5 mr-2" data-slot="icon" fill="none" stroke-width="5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path>
        </svg>
        <span>{{ session('error') }}</span>
    </div>
    <button onclick="dismissAlert()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
@endif