<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @for($i = 1; $i <= 16; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                        <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <i class="fas fa-box text-4xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Product {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mb-3">High quality product with great features and benefits.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-green-600">${{ number_format(rand(200, 1999) / 100, 2) }}</span>
                            @auth
                                <button class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
                                    <i class="fas fa-cart-plus mr-1"></i> Add
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Load More Button -->
            <div class="mt-8 text-center">
                <button class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    Load More Products
                </button>
            </div>
        </div>
    </div>
</x-app-layout>