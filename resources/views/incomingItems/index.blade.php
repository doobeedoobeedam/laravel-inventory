<x-layout>
    {{-- kirim title ke layout --}}
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full flex items-center justify-between my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Incoming Items</h2>
        @if (Auth::check() && Auth::user()->is_admin === 1)
        <div class="flex items-center gap-3">
            <a href="{{ route('incomingItems.excel') }}" class="mr-2 px-3 py-2 text-xs font-medium text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md cursor-pointer">
                Download Report
            </a>
            <a href="/items/incoming/create" class="px-3 py-2 text-xs font-medium text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-md cursor-pointer hover:bg-teal-700">
                Add New Incoming Item
            </a>
        </div> 
        @endif
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Item Name</th>
                        <th class="px-4 py-3">Date of Entry</th>
                        <th class="px-4 py-3">Quantity Entered</th>
                        <th class="px-4 py-3">Supplier Name</th>
                        @if (Auth::check() && Auth::user()->is_admin === 1)
                        <th class="px-4 py-3">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($incomingItems as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-semibold">
                                {{ $item->item['item_name'] }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ \Carbon\Carbon::parse($item->date_of_entry)->format('l, j F Y') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item['quantity_entered'] }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->supplier['supplier_name'] ?? '-' }}
                            </td>
                            @if (Auth::check() && Auth::user()->is_admin === 1)
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <form action="{{ route('incomingItems.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-teal-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>                                
                                </div>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr class="text-gray-700 dark:text-gray-400 text-center">
                            <td colspan="5" class="px-4 py-3 text-sm">Data not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
