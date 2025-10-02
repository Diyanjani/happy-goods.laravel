<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Our Grocery Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-green-500 to-blue-600 rounded-lg shadow-lg p-8 mb-8 text-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h1 class="text-4xl font-bold mb-4">Fresh Groceries Delivered</h1>
                        <p class="text-xl mb-6">Get the freshest groceries delivered right to your doorstep. Quality products, competitive prices, and fast delivery.</p>
                        <a href="{{ route('shop') }}" class="bg-white text-green-600 font-semibold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors inline-block">
                            Shop Now
                        </a>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-shopping-cart text-8xl opacity-75"></i>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="text-green-600 text-4xl mb-4">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fresh Products</h3>
                    <p class="text-gray-600">We source the freshest fruits, vegetables, and organic products daily.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Same-day delivery available for orders placed before 2 PM.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="text-purple-600 text-4xl mb-4">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Best Prices</h3>
                    <p class="text-gray-600">Competitive prices with regular discounts and special offers.</p>
                </div>
            </div>

            <!-- Popular Categories -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Popular Categories</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('categories.show', 1) }}" class="bg-gray-50 rounded-lg p-4 text-center hover:bg-gray-100 transition-colors">
                        <div class="text-red-500 text-3xl mb-2">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h3 class="font-semibold">Fruits</h3>
                    </a>

                    <a href="{{ route('categories.show', 2) }}" class="bg-gray-50 rounded-lg p-4 text-center hover:bg-gray-100 transition-colors">
                        <div class="text-green-500 text-3xl mb-2">
                            <i class="fas fa-carrot"></i>
                        </div>
                        <h3 class="font-semibold">Vegetables</h3>
                    </a>

                    <a href="{{ route('categories.show', 3) }}" class="bg-gray-50 rounded-lg p-4 text-center hover:bg-gray-100 transition-colors">
                        <div class="text-yellow-500 text-3xl mb-2">
                            <i class="fas fa-bread-slice"></i>
                        </div>
                        <h3 class="font-semibold">Bakery</h3>
                    </a>

                    <a href="{{ route('categories.show', 4) }}" class="bg-gray-50 rounded-lg p-4 text-center hover:bg-gray-100 transition-colors">
                        <div class="text-blue-500 text-3xl mb-2">
                            <i class="fas fa-cheese"></i>
                        </div>
                        <h3 class="font-semibold">Dairy</h3>
                    </a>
                </div>
            </div>

            <!-- Call to Action -->
            @guest
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Start Shopping Today!</h2>
                <p class="text-gray-600 mb-6">Create an account to track your orders, save favorites, and get personalized recommendations.</p>
                <div class="space-x-4">
                    <a href="{{ route('register') }}" class="bg-green-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-green-700 transition-colors">
                        Sign Up
                    </a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                        Sign In
                    </a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</x-app-layout>