<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Add New User</h2>
        <a href="/users" class="px-3 py-2 text-xs font-medium transition-colors duration-150 text-teal-500 bg-white border dark:bg-gray-700 dark:text-gray-200 dark:border-gray-700 rounded-md cursor-pointer">
            Back
        </a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('users.store') }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            @csrf
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input name="name" value="{{ old('name') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('name') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Username</span>
                    <input name="username" value="{{ old('username') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('username') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('username')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input type="password" name="password" value="{{ old('password') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('password') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('password')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Level</span>
                    <select name="level" id="level" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="1">Admin</option>
                        <option value="0">Basic User</option>
                    </select>
                    @error('level')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Submit</button>
        </form>

    </div>
</x-layout>
