<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ 'Edit '.$title }}</x-slot:title>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ 'Edit '.$title }}</h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('profile.update') }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            @csrf
            @method('patch')
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input name="name" value="{{ old('name', $user->name) }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('name') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Username</span>
                    <input name="username" value="{{ old('name', $user->username) }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('username') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('username')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Save</button>
        </form>

    </div>
</x-layout>