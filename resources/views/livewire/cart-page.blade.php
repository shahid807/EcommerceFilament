<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                                <th class="text-left font-semibold">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item)
                                <tr wire:key={{ $item['product_id'] }}>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 mr-4" src="{{ url('storage', $item['image']) }}"
                                                alt="{{ $item['name'] }}">
                                            <span class="font-semibold"> {{ $item['name'] }} </span>
                                        </div>
                                    </td>
                                    <td class="py-4"> {{ Number::currency($item['unit_amount'], 'PKR') }} </td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button  wire:click="decreaseQty({{ $item['product_id'] }})" class="border rounded-md py-2 px-4 mr-2">-</button>
                                            <span class="text-center w-8">{{ $item['quantity'] }}</span>
                                            <button wire:click="increaseQty({{ $item['product_id'] }})" class="border rounded-md py-2 px-4 ml-2">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        {{ Number::currency($item['unit_amount'] * $item['quantity'], 'PKR') }}
                                    </td>
                                    <td>
                                        <button wire:click="removeItem({{ $item['product_id'] }})" wire:confirm="Are you sure you want to delete this post?"
                                            class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                                            <span wire:loading.remove
                                                wire:target="removeItem({{ $item['product_id'] }})">Remove</span>

                                            <span wire:loading wire:target="removeItem({{ $item['product_id'] }})"
                                                role='status' aria-label='loading'>
                                                <svg class='w-6 h-6 stroke-indigo-600 animate-spin ' viewBox='0 0 24 24'
                                                    fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <g clip-path='url(#clip0_9023_61563)'>
                                                        <path
                                                            d='M14.6437 2.05426C11.9803 1.2966 9.01686 1.64245 6.50315 3.25548C1.85499 6.23817 0.504864 12.4242 3.48756 17.0724C6.47025 21.7205 12.6563 23.0706 17.3044 20.088C20.4971 18.0393 22.1338 14.4793 21.8792 10.9444'
                                                            stroke='stroke-current' stroke-width='1.4'
                                                            stroke-linecap='round' class='my-path'></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id='clip0_9023_61563'>
                                                            <rect width='24' height='24' fill='white'>
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span class='sr-only'>Loading...</span>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-4xl font-semibold text-slate-500">
                                        No items available in the cart </td>
                                </tr>
                            @endforelse
                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>{{ Number::currency($grand_total, 'PKR') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>{{ Number::currency(0, 'PKR') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>{{ Number::currency(0, 'PKR') }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Grand Total</span>
                        <span class="font-semibold">{{ Number::currency($grand_total, 'PKR') }}</span>
                    </div>
                    @if ($cart_items)
                        <a wire:navigate href="{{ route('checkout') }}" class="bg-blue-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
