<!-- NAVBAR -->
<nav class="bg-gray-800 shadow-lg border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Brand Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-yellow-400 hover:text-yellow-300 transition-colors duration-200">
                    Grocery Store
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-1">
                <!-- Public Links -->
                <a href="{{ route('home') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-gray-700 text-white' : '' }}">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('products.*') ? 'bg-gray-700 text-white' : '' }}">
                    Products
                </a>
                
                <!-- Cart link (always visible) -->
                <a href="{{ route('cart.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('cart.*') ? 'bg-gray-700 text-white' : '' }}">
                    Cart
                </a>
                
                @auth
                    <!-- Authenticated User Links -->
                    <a href="{{ route('orders.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs('orders.*') ? 'bg-gray-700 text-white' : '' }}">
                        Checkout
                    </a>
                    
                    <!-- User Welcome Message -->
                    <span class="text-yellow-300 px-3 py-2 text-sm font-medium">
                        Hello, {{ Auth::user()->name }}!
                    </span>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="inline-block ml-2">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-2 border-red-500 hover:border-red-600 cursor-pointer shadow-md">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- Guest User Links -->
                    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-2 border-blue-500 hover:border-blue-600 ml-2 shadow-md">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-2 border-green-500 hover:border-green-600 shadow-md">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-100 hover:text-white hover:bg-gray-700 p-2 rounded-md" onclick="toggleMobileMenu()">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 border-t border-gray-700">
                <a href="{{ route('home') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-gray-700 text-white' : '' }}">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('products.*') ? 'bg-gray-700 text-white' : '' }}">
                    Products
                </a>
                <a href="{{ route('cart.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('cart.*') ? 'bg-gray-700 text-white' : '' }}">
                    Cart
                </a>
                
                @auth
                    <a href="{{ route('orders.index') }}" class="text-gray-100 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('orders.*') ? 'bg-gray-700 text-white' : '' }}">
                        Checkout
                    </a>
                    <div class="text-yellow-300 px-3 py-2 text-base font-medium">
                        Hello, {{ Auth::user()->name }}!
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="block px-3 py-1">
                        @csrf
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-base font-medium border-2 border-red-500 hover:border-red-600 shadow-md">
                            Logout
                        </button>
                    </form>
                @else
                    <div class="px-3 py-1 space-y-2">
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white block px-3 py-2 rounded-md text-base font-medium border-2 border-blue-500 hover:border-blue-600 shadow-md text-center">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white block px-3 py-2 rounded-md text-base font-medium border-2 border-green-500 hover:border-green-600 shadow-md text-center">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}
</script>