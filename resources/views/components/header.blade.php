<header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="/images/adr-companies-logo.png" alt="ADR Companies Logo" class="h-14">
            </div>
            
            <!-- Navigation -->
            <nav class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-base font-semibold text-gray-700 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-base font-semibold text-gray-700 hover:text-gray-900">Log in</a>
                    @endauth
                @endif
                <span class="text-base font-bold text-gray-900">CCTV</span>
            </nav>
        </div>
    </div>
</header>