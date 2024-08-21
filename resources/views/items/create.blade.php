<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Add New Item</h2>
        <a href="/items" class="px-3 py-2 text-xs font-medium transition-colors duration-150 text-teal-500 bg-white border dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 rounded-md cursor-pointer">
            Back
        </a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('items.store') }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            @csrf
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Item Name</span>
                    <input name="item_name" value="{{ old('item_name') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('item_name') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('item_name')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Specification</span>
                    <input name="specification" value="{{ old('specification') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('specification') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('specification')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/3 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Condition</span>
                    <input name="condition" value="{{ old('condition') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('condition') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('condition')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/3 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Category</span>
                    <input name="category" value="{{ old('category') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('category') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('category')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>

                <label class="text-sm w-full md:w-1/3 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Item Type</span>
                    <input name="item_type" value="{{ old('item_type') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('item_type') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('item_type')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Item Location</span>
                    <input name="item_location" value="{{ old('item_location') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('item_location') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('item_location')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Funding Source</span>
                    <input name="funding_source" value="{{ old('funding_source') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('funding_source') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('funding_source')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Submit</button>
        </form>

    </div>
</x-layout>
