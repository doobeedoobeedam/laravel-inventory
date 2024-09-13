<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit Supplier</h2>
        <a href="/suppliers" class="px-3 py-2 text-xs font-medium transition-colors duration-150 text-teal-500 bg-white border dark:bg-gray-700 dark:text-gray-200 dark:border-gray-700 rounded-md cursor-pointer">
            Back
        </a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <form action="{{ route('suppliers.update', $supplier->supplier_code) }}" method="POST" class="h-full px-4 py-4 bg-white dark:bg-gray-800">
            @csrf
            @method('PUT')
            <div class="w-full flex flex-col md:flex-row md:space-x-4">
                <label class="text-sm md:mb-0 w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Supplier Name</span>
                    <input value="{{ old('supplier_name', $supplier->supplier_name) }}" name="supplier_name" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('supplier_name') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('supplier_name')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            
                <label class="text-sm w-full md:w-1/2 mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Phone</span>
                    <input value="{{ old('supplier_phone', $supplier->supplier_phone) }}" name="supplier_phone" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('supplier_phone') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('supplier_phone')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="w-full mb-4">
                <label class="w-full text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                    <input name="supplier_address" value="{{ old('supplier_address', $supplier->supplier_address) }}" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:bg-gray-700 {{ $errors->has('supplier_address') ? 'border-red-600 focus:border-red-400 focus:shadow-outline-red' : 'dark:border-gray-600 focus:border-green-400 focus:shadow-outline-green dark:focus:shadow-outline-gray' }} focus:outline-none form-input" />
                    @error('supplier_address')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-lg active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal">Submit</button>
        </form>

    </div>
</x-layout>
