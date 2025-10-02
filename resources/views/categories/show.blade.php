<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex items-center">
                    <div class="bg-green-100 p-4 rounded-full mr-4">
                        <i class="fas fa-apple-alt text-2xl text-green-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Sample Category</h1>
                        <p class="text-gray-600 mt-2">Fresh and organic products in this category</p>
                    </div>
                </div>
            </div>

            <!-- Products in Category -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @for($i = 1; $i <= 8; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                        <div class="w-full h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                            <i class="fas fa-apple-alt text-4xl text-green-600"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Category Product {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mb-3">Product from this specific category.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-green-600">${{ number_format(rand(150, 899) / 100, 2) }}</span>
                            @auth
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
                                    <i class="fas fa-cart-plus mr-1"></i> Add to Cart
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                    Login to Buy
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Back to Categories -->
            <div class="mt-8">
                <a href="{{ route('categories.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Categories
                </a>
            </div>
        </div>
    </div>
</x-app-layout>