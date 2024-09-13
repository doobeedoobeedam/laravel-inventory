<x-auth>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="POST" action="{{ route('login.post') }}" class="w-full">
        @csrf
        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Login
        </h1>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Username</span>
            <input name="username" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Username" />
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Password</span>
            <input name="password" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
        </label>

        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">
            Login
        </button>

            {{-- <p class="mt-4 text-center">
                <a class="text-sm font-medium text-teal-500 dark:text-teal-400 hover:underline" href="./forgot-password.html">
                    Forgot your password?
                </a>
            </p> --}}
    </form>
</x-auth>