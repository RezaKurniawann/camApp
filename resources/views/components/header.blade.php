{{-- resources/views/components/header.blade.php --}}
<header class="bg-white shadow-sm sticky top-0 z-50">
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
                
                <!-- Filter Toggle Button (Mobile & Tablet Only) - Soft Design -->
                <button id="mobileFilterToggle" 
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-gradient-to-r from-blue-50 to-white text-gray-700 rounded-lg transition-colors border border-gray-200 hover:from-blue-100 hover:to-blue-50">
                    <style>
                        #mobileFilterToggle {
                            display: inline-flex;
                        }
                        @media (min-width: 1024px) {
                            #mobileFilterToggle {
                                display: none !important;
                            }
                        }
                    </style>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span class="text-sm font-medium">Filter</span>
                    @php
                        $totalFilters = collect([
                            request('servers', []),
                            request('brands', []),
                            request('variants', []),
                            request('types', []),
                            request('regions', []),
                            request('companies', []),
                            request('locations', []),
                            request('categories', []),
                        ])
                            ->flatten()
                            ->count();
                    @endphp
                    @if ($totalFilters > 0)
                        <span class="inline-flex items-center justify-center w-5 h-5 text-xs font-bold bg-blue-600 text-white rounded-full">
                            {{ $totalFilters }}
                        </span>
                    @endif
                </button>
            </nav>
        </div>
    </div>
</header>