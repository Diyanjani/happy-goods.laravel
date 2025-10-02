<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Sample Categories -->
                <a href="{{ route('categories.show', 1) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-red-100 to-red-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-apple-alt text-6xl text-red-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Fruits</h3>
                        <p class="text-gray-600 text-sm">Fresh and organic fruits</p>
                        <p class="text-green-600 font-medium mt-2">25+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 2) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-green-100 to-green-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-carrot text-6xl text-green-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Vegetables</h3>
                        <p class="text-gray-600 text-sm">Farm fresh vegetables</p>
                        <p class="text-green-600 font-medium mt-2">30+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 3) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-yellow-100 to-yellow-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-bread-slice text-6xl text-yellow-600"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Bakery</h3>
                        <p class="text-gray-600 text-sm">Fresh baked goods</p>
                        <p class="text-green-600 font-medium mt-2">15+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 4) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-blue-100 to-blue-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-cheese text-6xl text-blue-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Dairy</h3>
                        <p class="text-gray-600 text-sm">Milk, cheese & dairy products</p>
                        <p class="text-green-600 font-medium mt-2">20+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 5) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-purple-100 to-purple-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-fish text-6xl text-purple-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Meat & Seafood</h3>
                        <p class="text-gray-600 text-sm">Fresh meat and seafood</p>
                        <p class="text-green-600 font-medium mt-2">18+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 6) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-orange-100 to-orange-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-cookie-bite text-6xl text-orange-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Snacks</h3>
                        <p class="text-gray-600 text-sm">Chips, cookies & snacks</p>
                        <p class="text-green-600 font-medium mt-2">35+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 7) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-teal-100 to-teal-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-tint text-6xl text-teal-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Beverages</h3>
                        <p class="text-gray-600 text-sm">Juices, sodas & drinks</p>
                        <p class="text-green-600 font-medium mt-2">22+ Products</p>
                    </div>
                </a>

                <a href="{{ route('categories.show', 8) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="aspect-w-1 aspect-h-1 bg-gradient-to-br from-pink-100 to-pink-200">
                        <div class="w-full h-48 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <i class="fas fa-pump-soap text-6xl text-pink-500"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Household</h3>
                        <p class="text-gray-600 text-sm">Cleaning & household items</p>
                        <p class="text-green-600 font-medium mt-2">40+ Products</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>