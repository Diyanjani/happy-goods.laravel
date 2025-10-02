<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Cart Items</h3>
                        
                        <!-- Sample Cart Items -->
                        @for($i = 1; $i <= 3; $i++)
                        <div class="flex items-center justify-between border-b border-gray-200 py-4 {{ $i == 3 ? '' : 'mb-4' }}">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-apple-alt text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Sample Product {{ $i }}</h4>
                                    <p class="text-gray-600 text-sm">Fresh and organic</p>
                                    <p class="text-green-600 font-medium">${{ number_format(rand(200, 599) / 100, 2) }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full hover:bg-gray-300">-</button>
                                <span class="font-medium">{{ rand(1, 5) }}</span>
                                <button class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full hover:bg-gray-300">+</button>
                                <button class="text-red-600 hover:text-red-800 ml-4">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @endfor

                        @if(true) <!-- Replace with cart empty check -->
                        <div class="mt-6">
                            <a href="{{ route('shop') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors inline-flex items-center">
                                <i class="fas fa-plus mr-2"></i> Continue Shopping
                            </a>
                        </div>
                        @else
                        <!-- Empty Cart -->
                        <div class="text-center py-8">
                            <i class="fas fa-shopping-cart text-4xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-600 mb-2">Your cart is empty</h3>
                            <p class="text-gray-500 mb-6">Add some products to get started</p>
                            <a href="{{ route('shop') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                                Start Shopping
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                        
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">$24.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium">$4.99</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-medium">$2.50</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold">Total</span>
                                    <span class="text-lg font-semibold text-green-600">$32.46</span>
                                </div>
                            </div>
                        </div>

                        <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                            Proceed to Checkout
                        </button>

                        <!-- Promo Code -->
                        <div class="mt-4">
                            <label for="promo" class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                            <div class="flex">
                                <input type="text" id="promo" placeholder="Enter code" class="flex-1 border border-gray-300 rounded-l-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <button class="bg-gray-600 text-white px-4 py-2 rounded-r-lg hover:bg-gray-700 transition-colors">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>