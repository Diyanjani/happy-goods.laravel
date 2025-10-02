<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">About Our Grocery Store</h1>
                    <p class="text-xl text-gray-600">Serving fresh, quality groceries to our community since 2020</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Story</h2>
                        <p class="text-gray-600 mb-4">
                            We started with a simple mission: to provide fresh, high-quality groceries to our local community. 
                            What began as a small neighborhood store has grown into a trusted source for all your grocery needs.
                        </p>
                        <p class="text-gray-600 mb-4">
                            We pride ourselves on sourcing the freshest produce, working with local farmers and suppliers 
                            whenever possible. Our commitment to quality and customer service has made us a favorite among 
                            families in the area.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 p-8 rounded-full inline-block">
                            <i class="fas fa-store text-6xl text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="bg-green-100 p-4 rounded-full inline-block mb-4">
                        <i class="fas fa-leaf text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Fresh Quality</h3>
                    <p class="text-gray-600">We ensure all our products meet the highest quality standards and are always fresh.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="bg-blue-100 p-4 rounded-full inline-block mb-4">
                        <i class="fas fa-handshake text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Customer First</h3>
                    <p class="text-gray-600">Our customers are at the heart of everything we do. Your satisfaction is our priority.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="bg-purple-100 p-4 rounded-full inline-block mb-4">
                        <i class="fas fa-heart text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Community</h3>
                    <p class="text-gray-600">We're proud to be part of this community and support local farmers and suppliers.</p>
                </div>
            </div>

            <!-- Team Section -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user text-3xl text-gray-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">John Smith</h3>
                        <p class="text-gray-600">Store Manager</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user text-3xl text-gray-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Sarah Johnson</h3>
                        <p class="text-gray-600">Fresh Produce Manager</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-gray-200 w-24 h-24 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user text-3xl text-gray-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Mike Davis</h3>
                        <p class="text-gray-600">Customer Service Lead</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>