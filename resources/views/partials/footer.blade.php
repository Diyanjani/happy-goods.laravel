<!-- Footer -->
<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ config('app.name', 'Grocery Store') }}</h3>
                <p class="text-gray-300 text-sm">Your trusted partner for fresh groceries and daily essentials.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('shop') }}" class="text-gray-300 hover:text-white transition-colors">Shop</a></li>
                    <li><a href="{{ route('categories.index') }}" class="text-gray-300 hover:text-white transition-colors">Categories</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition-colors">Products</a></li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Shipping Info</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Returns</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <div class="space-y-2 text-sm text-gray-300">
                    <p><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</p>
                    <p><i class="fas fa-envelope mr-2"></i> info@grocerystore.com</p>
                    <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Main St, City, State 12345</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-600 mt-8 pt-6 text-center text-sm text-gray-300">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Grocery Store') }}. All rights reserved.</p>
        </div>
    </div>
</footer>
