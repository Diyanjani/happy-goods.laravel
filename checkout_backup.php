<x-app-layout>
<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
        
        @if(session('success'))
            <!-- Order Success Message -->
            <h1 class="text-3xl font-bold mb-6 text-green-700">Thank you, {{ session('customer_name', 'Customer') }}!</h1>
            <p class="mb-4">Your order has been placed successfully.</p>
            <p><strong>Order Number:</strong> {{ session('order_number') }}</p>
            <p><strong>Email:</strong> {{ session('customer_email') }}</p>
            <p><strong>Shipping Address:</strong> {{ session('shipping_address') }}</p>
            <p class="text-xl font-bold mt-4">Total Paid: ${{ number_format(session('total_amount', 0), 2) }}</p>
            <a href="{{ route('products.index') }}" class="inline-block mt-6 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Back to Shopping</a>
        @else
            <!-- Checkout Form -->
            <h1 class="text-3xl font-bold mb-6 text-green-700">Checkout</h1>

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            <!-- Order Summary -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>
                <ul class="divide-y divide-gray-200 mb-4">
                    @forelse($cartItems as $item)
                        <li class="py-2 flex justify-between items-center">
                            <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            <span>${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">No items in cart</li>
                    @endforelse
                </ul>
                <div class="border-t pt-2 space-y-1">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping:</span>
                        <span>${{ number_format($shipping, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tax:</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                    <div class="text-xl font-bold flex justify-between border-t pt-2">
                        <span>Total Amount:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Simple Checkout Form -->
            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-semibold mb-1">Full Name</label>
                    <input type="text" name="full_name" class="w-full border border-gray-300 p-2 rounded" required value="{{ old('full_name') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required value="{{ old('email') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Shipping Address</label>
                    <textarea name="address" class="w-full border border-gray-300 p-2 rounded" required>{{ old('address') }}</textarea>
                </div>
                <div>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Place Order
                    </button>
                </div>
            </form>
        @endif

    </div>
</div>
</x-app-layout>
                                        @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Options -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Delivery Options</h2>
                        
                        <div class="space-y-3">
                            <label class="flex items-center justify-between p-3 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center">
                                    <input type="radio" name="delivery_option" value="standard" checked
                                           class="text-green-600 focus:ring-green-500">
                                    <div class="ml-3">
                                        <span class="text-sm font-medium text-gray-900">Standard Delivery</span>
                                        <p class="text-sm text-gray-500">2-3 business days</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Free</span>
                            </label>

                            <label class="flex items-center justify-between p-3 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center">
                                    <input type="radio" name="delivery_option" value="express"
                                           class="text-green-600 focus:ring-green-500">
                                    <div class="ml-3">
                                        <span class="text-sm font-medium text-gray-900">Express Delivery</span>
                                        <p class="text-sm text-gray-500">Same day delivery</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$9.99</span>
                            </label>

                            <label class="flex items-center justify-between p-3 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center">
                                    <input type="radio" name="delivery_option" value="pickup"
                                           class="text-green-600 focus:ring-green-500">
                                    <div class="ml-3">
                                        <span class="text-sm font-medium text-gray-900">Store Pickup</span>
                                        <p class="text-sm text-gray-500">Ready in 2 hours</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Free</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Order Summary</h2>
                    
                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6">
                        @if(isset($cartItems) && $cartItems->count() > 0)
                            @foreach($cartItems as $item)
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 rounded-md flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h4>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </div>
                            @endforeach
                        @else
                            <!-- Sample items for demonstration -->
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-md flex-shrink-0"></div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900">Fresh Apples</h4>
                                    <p class="text-sm text-gray-500">Qty: 2</p>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$6.99</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-md flex-shrink-0"></div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900">Whole Milk</h4>
                                    <p class="text-sm text-gray-500">Qty: 1</p>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$3.49</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-md flex-shrink-0"></div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900">Bread</h4>
                                    <p class="text-sm text-gray-500">Qty: 1</p>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$2.99</span>
                            </div>
                        @endif
                    </div>

                    <!-- Order Totals -->
                    <div class="border-t border-gray-200 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-900">$13.47</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-gray-900">Free</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="text-gray-900">$1.08</span>
                        </div>
                        <div class="border-t border-gray-200 pt-2">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold text-gray-900">Total</span>
                                <span class="text-lg font-semibold text-gray-900">$14.55</span>
                            </div>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" class="w-full mt-6 bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-md font-semibold text-lg transition-colors duration-200 shadow-md">
                        Place Order
                    </button>

                    <!-- Security Notice -->
                    <div class="mt-4 text-center">
                        <div class="flex items-center justify-center text-sm text-gray-500">
                            <i class="fas fa-lock mr-2"></i>
                            <span>Secure checkout with 256-bit SSL encryption</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>