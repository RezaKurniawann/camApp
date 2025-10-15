{{-- resources/views/partials/mobile-filters.blade.php --}}

<div id="mobileFilterPanel" class="lg:hidden fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div id="mobileFilterBackdrop" class="absolute inset-0 bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Filter Panel -->
    <div id="mobileFilterContent"
        class="absolute right-0 top-0 h-full w-full max-w-sm bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">

        <!-- Panel Header -->
        <div
            class="sticky top-0 bg-gradient-to-r from-blue-50 to-white p-4 border-b border-gray-200 flex items-center justify-between z-10">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filters
            </h3>
            <button id="closeMobileFilter" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Filter Content -->
        <div class="p-4">
            <form method="GET" action="{{ url('/') }}" id="mobileFilterForm">
                <input type="hidden" name="search" value="{{ request('search') }}">

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
                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-xs text-gray-600 flex items-center gap-1">
                            <span
                                class="inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-blue-600 rounded-full">
                                {{ $totalFilters }}
                            </span>
                            <span>active filter(s)</span>
                        </p>
                        <a href="{{ url('/') }}"
                            class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            Clear All
                        </a>
                    </div>
                @endif

                <div class="space-y-2">
                    @include('partials.filter-item', [
                        'id' => 'mobileServerFilter',
                        'title' => 'Server Name',
                        'icon' =>
                            'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2',
                        'name' => 'servers',
                        'items' => $servers,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileBrandFilter',
                        'title' => 'Brand',
                        'icon' =>
                            'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                        'name' => 'brands',
                        'items' => $brands,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileVariantFilter',
                        'title' => 'Variant',
                        'icon' =>
                            'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z',
                        'name' => 'variants',
                        'items' => $variants,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileTypeFilter',
                        'title' => 'Type',
                        'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14',
                        'name' => 'types',
                        'items' => $types,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileRegionFilter',
                        'title' => 'Region',
                        'icon' =>
                            'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                        'name' => 'regions',
                        'items' => $regions,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileCompanyFilter',
                        'title' => 'Company',
                        'icon' =>
                            'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                        'name' => 'companies',
                        'items' => $companies,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileLocationFilter',
                        'title' => 'Location',
                        'icon' =>
                            'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                        'name' => 'locations',
                        'items' => $locations,
                        'isMobile' => true,
                    ])

                    @include('partials.filter-item', [
                        'id' => 'mobileCategoryFilter',
                        'title' => 'Category',
                        'icon' => 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z',
                        'name' => 'categories',
                        'items' => $categories,
                        'isMobile' => true,
                        'isLast' => true,
                    ])
                </div>

                <!-- Apply Button (Sticky at bottom) -->
                <div class="sticky bottom-0 bg-white border-t border-gray-200 p-4 mt-6 -mx-4 -mb-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-colors">
                        Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Mobile Filter Toggle Logic
    document.addEventListener('DOMContentLoaded', function() {
        const mobileFilterToggle = document.getElementById('mobileFilterToggle');
        const mobileFilterPanel = document.getElementById('mobileFilterPanel');
        const mobileFilterContent = document.getElementById('mobileFilterContent');
        const mobileFilterBackdrop = document.getElementById('mobileFilterBackdrop');
        const closeMobileFilter = document.getElementById('closeMobileFilter');

        function openMobileFilter() {
            mobileFilterPanel.classList.remove('hidden');
            // Trigger reflow
            mobileFilterContent.offsetHeight;
            // Add animation
            mobileFilterContent.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden'; // Prevent background scroll
        }

        function closeMobileFilterPanel() {
            mobileFilterContent.classList.add('translate-x-full');
            setTimeout(() => {
                mobileFilterPanel.classList.add('hidden');
                document.body.style.overflow = ''; // Restore scroll
            }, 300);
        }

        if (mobileFilterToggle) {
            mobileFilterToggle.addEventListener('click', openMobileFilter);
        }

        if (closeMobileFilter) {
            closeMobileFilter.addEventListener('click', closeMobileFilterPanel);
        }

        if (mobileFilterBackdrop) {
            mobileFilterBackdrop.addEventListener('click', closeMobileFilterPanel);
        }

        // Close on form submit
        const mobileFilterForm = document.getElementById('mobileFilterForm');
        if (mobileFilterForm) {
            mobileFilterForm.addEventListener('submit', function() {
                closeMobileFilterPanel();
            });
        }
    });
</script>
