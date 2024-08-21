<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Add New Incoming Item</h2>
        <a href="/items/incoming" class="px-3 py-2 text-xs font-medium transition-colors duration-150 text-teal-500 bg-white border dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 rounded-md cursor-pointer">
            Back
        </a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('incomingItems.store') }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            @csrf
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="block text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Item</span>
                    <select name="item_code" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 form-select focus:outline-none focus:shadow-outline-teal {{ $errors->has('item_code') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }}">
                        @foreach ($items as $item)
                            <option value="{{ $item['item_code'] }}">{{ $item['item_name'] }}</option>
                        @endforeach
                    </select>
                    @error('item_code')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Supplier</span>
                    <select name="supplier_code" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 form-select focus:outline-none focus:shadow-outline-teal {{ $errors->has('supplier_code') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }}">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier['supplier_code'] }}">{{ $supplier['supplier_name'] }}</option>
                        @endforeach
                    </select>
                    @error('supplier_code')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Date of Entry</span>
                    <input type="date" name="date_of_entry" value="{{ old('date_of_entry') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('date_of_entry') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('date_of_entry')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Quantity Entered</span>
                    <input type="number" name="quantity_entered" value="{{ old('quantity_entered') }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('quantity_entered') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('quantity_entered')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Submit</button>
        </form>

    </div>
</x-layout>
