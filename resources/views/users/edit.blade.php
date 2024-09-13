<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>Edit User</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit User</h2>
        <a href="/users" class="px-3 py-2 text-xs font-medium transition-colors duration-150 text-teal-500 bg-white border dark:bg-gray-700 dark:text-gray-200 dark:border-gray-700 rounded-md cursor-pointer">
            Back
        </a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Profile Information') }}
            </h2>

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
                    <input name="username" value="{{ old('username', $user->username) }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('username') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('username')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Level</span>
                    <select name="level" id="level" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>
                            Admin {!! $user->is_admin == 1 ? '&check;' : '' !!}
                        </option>
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>
                            Basic User {!! $user->is_admin == 0 ? '&check;' : '' !!}
                        </option>
                    </select>
                    @error('level')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Save</button>
        </form>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('password.update', ['id' => $user->id]) }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Update Password') }}
            </h2>

            @csrf
            @method('put')
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                    <input type="password" name="current_password" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('current_password') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('current_password')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">New Password</span>
                    <input type="password" name="new_password" id="new_password" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('new_password') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('new_password')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Password Confirmation</span>
                    <input oninput="validatePasswords()" type="password" name="password_confirmation" id="password_confirmation" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('password_confirmation') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('password_confirmation')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                    <span id="passwordNotMatch" class="text-xs text-red-600 dark:text-red-400 hidden">The new passwords do not match.</span>
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Save</button>
        </form>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6 px-4 py-4 bg-white dark:bg-gray-800">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Be aware that once you delete this account, all data will be permanently deleted and cannot be recovered.') }}
        </p>

        <button @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Delete</button>
    </div>

    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <div class="mt-4 mb-6">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Are you sure you want to delete this account?
                </p>
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    {{ __('Be aware that once you delete this account, all data will be permanently deleted and cannot be recovered.') }}
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-4 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="h-full px-4 py-4 dark:bg-gray-800">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Yes
                    </button>
                </form>
            </footer>
        </div>
    </div>
</x-layout>

<script>
    function validatePasswords() {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const passwordNotMatch = document.getElementById('passwordNotMatch');

        if (newPassword !== confirmPassword) {
            passwordNotMatch.classList.remove('hidden');
        } else {
            passwordNotMatch.classList.add('hidden');
        }
    }

</script>
