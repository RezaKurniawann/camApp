{{-- resources/views/partials/filters.blade.php --}}
<aside class="w-70 flex-shrink-0 self-start" style="position: sticky; top: 80px; display: none;">
    <style>
        @media (min-width: 1024px) {
            aside[style*="top: 80px"] {
                display: block !important;
            }
        }
    </style>
    <form method="GET" action="{{ url('/') }}" id="filterForm">
        <input type="hidden" name="search" value="{{ request('search') }}">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Filter Header -->
            <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filters
                    </h3>
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
                        <a href="{{ url('/') }}"
                            class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">
                            Clear All
                        </a>
                    @endif
                </div>
                @if ($totalFilters > 0)
                    <p class="text-xs text-gray-600 mt-2 flex items-center gap-1">
                        <span
                            class="inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-white bg-blue-600 rounded-full">{{ $totalFilters }}</span>
                        <span>active filter(s)</span>
                    </p>
                @endif
            </div>

            <!-- Filter Content with Scroll -->
            <div class="overflow-y-auto" style="max-height: calc(100vh - 260px);">
                @include('partials.filter-item', [
                    'id' => 'serverFilter',
                    'title' => 'Server Name',
                    'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2',
                    'name' => 'servers',
                    'items' => $servers,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'brandFilter',
                    'title' => 'Brand',
                    'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                    'name' => 'brands',
                    'items' => $brands,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'variantFilter',
                    'title' => 'Variant',
                    'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z',
                    'name' => 'variants',
                    'items' => $variants,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'typeFilter',
                    'title' => 'Type',
                    'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14',
                    'name' => 'types',
                    'items' => $types,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'regionFilter',
                    'title' => 'Region',
                    'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'name' => 'regions',
                    'items' => $regions,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'companyFilter',
                    'title' => 'Company',
                    'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'name' => 'companies',
                    'items' => $companies,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'locationFilter',
                    'title' => 'Location',
                    'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                    'name' => 'locations',
                    'items' => $locations,
                    'isMobile' => false
                ])

                @include('partials.filter-item', [
                    'id' => 'categoryFilter',
                    'title' => 'Category',
                    'icon' => 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z',
                    'name' => 'categories',
                    'items' => $categories,
                    'isMobile' => false,
                    'isLast' => true
                ])
            </div>

            <!-- Apply Filter Button (Sticky at bottom) -->
            <div class="border-t border-gray-200 p-4 bg-white">
                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors shadow-sm hover:shadow-md">
                    Apply Filters
                </button>
            </div>
        </div>
    </form>
</aside>