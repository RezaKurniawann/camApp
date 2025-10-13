<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - CCTV</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <x-header />
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search Bar -->
        <div class="mb-6">
            <form method="GET" action="{{ url('/') }}" id="searchForm">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                        placeholder="Search..."
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </form>
        </div>

        <!-- Content Grid -->
        <div class="flex gap-6 items-start">
            <!-- Sidebar Filters -->
            <aside class="w-70 flex-shrink-0 self-start" style="position: sticky; top: 80px;">
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
                        <div class="overflow-y-auto" style="max-height: calc(100vh - 180px);">
                            <!-- Server Name Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="serverFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                                        </svg>
                                        <span>Server Name</span>
                                        @if (request('servers') && count(request('servers')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('servers')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="serverFilterIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="serverFilter" class="px-3 pb-4 space-y-1 filter-content">
                                    @foreach ($servers as $server)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="servers[]" value="{{ $server->id }}"
                                                {{ in_array($server->id, request('servers', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $server->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Brand Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="brandFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        <span>Brand</span>
                                        @if (request('brands') && count(request('brands')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('brands')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="brandFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="brandFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($brands as $brand)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                                {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $brand->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Variant Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="variantFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                        <span>Variant</span>
                                        @if (request('variants') && count(request('variants')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('variants')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="variantFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="variantFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($variants as $variant)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="variants[]" value="{{ $variant->id }}"
                                                {{ in_array($variant->id, request('variants', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $variant->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Type Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="typeFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                        <span>Type</span>
                                        @if (request('types') && count(request('types')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('types')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="typeFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="typeFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($types as $type)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="types[]" value="{{ $type->id }}"
                                                {{ in_array($type->id, request('types', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $type->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Region Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="regionFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Region</span>
                                        @if (request('regions') && count(request('regions')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('regions')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="regionFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="regionFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($regions as $region)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="regions[]" value="{{ $region->id }}"
                                                {{ in_array($region->id, request('regions', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $region->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Company Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="companyFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <span>Company</span>
                                        @if (request('companies') && count(request('companies')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('companies')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="companyFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="companyFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($companies as $company)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="companies[]" value="{{ $company->id }}"
                                                {{ in_array($company->id, request('companies', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $company->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Location Filter -->
                            <div class="border-b border-gray-100">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="locationFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Location</span>
                                        @if (request('locations') && count(request('locations')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('locations')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="locationFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="locationFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($locations as $location)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="locations[]" value="{{ $location->id }}"
                                                {{ in_array($location->id, request('locations', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $location->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div>
                                <button type="button"
                                    class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
                                    data-target="categoryFilter">
                                    <span class="flex items-center gap-3">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                        <span>Category</span>
                                        @if (request('categories') && count(request('categories')) > 0)
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request('categories')) }}</span>
                                        @endif
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
                                        id="categoryFilterIcon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="categoryFilter" class="px-3 pb-4 space-y-1 hidden filter-content">
                                    @foreach ($categories as $category)
                                        <label
                                            class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                                            <span
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $category->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </aside>

            <!-- Camera Grid -->
            <main class="flex-1 mt-0">
                @if ($cameras->count() > 0)
                    <div id="cameraGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @include('partials.camera-cards', ['cameras' => $cameras])
                    </div>

                    <!-- Infinite Scroll Loading Indicator -->
                    <div id="infiniteScrollLoader" class="text-center py-8 hidden">
                        <div class="inline-flex items-center gap-3 px-6 py-3 bg-white rounded-lg shadow-sm">
                            <svg class="animate-spin h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="text-gray-700 font-medium">Loading more cameras...</span>
                        </div>
                    </div>

                    <!-- No More Results Message -->
                    <div id="noMoreResults" class="text-center py-8 hidden">
                        <div class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 rounded-lg">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600 font-medium">All cameras loaded ({{ $totalCount }}
                                total)</span>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No cameras found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter to find what you're
                            looking for.</p>
                    </div>
                @endif
            </main>
        </div>
    </div>

    <x-footer />

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-50 hover:scale-110"
        aria-label="Back to top">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <script>
        // Store filter state in sessionStorage
        const STORAGE_KEY = 'camera_filter_state';

        // Infinite Scroll Variables
        let currentOffset = 12; // Start from 6 since we already loaded first 6
        let isLoading = false;
        let hasMoreData = {{ $totalCount > 12 ? 'true' : 'false' }};
        const totalCount = {{ $totalCount }};

        // Initialize filter states on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved filter states
            const savedState = sessionStorage.getItem(STORAGE_KEY);
            if (savedState) {
                const openFilters = JSON.parse(savedState);
                // Set all filters to hidden first
                document.querySelectorAll('.filter-content').forEach(filter => {
                    filter.classList.add('hidden');
                    const icon = document.getElementById(filter.id + 'Icon');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                });
                // Then open only the saved ones
                openFilters.forEach(filterId => {
                    const filter = document.getElementById(filterId);
                    const icon = document.getElementById(filterId + 'Icon');
                    if (filter && icon) {
                        filter.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    }
                });
            } else {
                // Default: close all filters first
                document.querySelectorAll('.filter-content').forEach(filter => {
                    filter.classList.add('hidden');
                    const icon = document.getElementById(filter.id + 'Icon');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                });
                // Then open serverFilter only
                const serverFilter = document.getElementById('serverFilter');
                const serverIcon = document.getElementById('serverFilterIcon');
                if (serverFilter && serverIcon) {
                    serverFilter.classList.remove('hidden');
                    serverIcon.classList.add('rotate-180');
                }
            }

            // Setup filter toggle event listeners
            document.querySelectorAll('.filter-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    toggleFilter(targetId);
                });
            });

            // Setup infinite scroll
            setupInfiniteScroll();
        });

        // Toggle Filter Accordion and save state
        function toggleFilter(filterId) {
            const filter = document.getElementById(filterId);
            const icon = document.getElementById(filterId + 'Icon');

            filter.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');

            // Save current state
            saveFilterState();
        }

        // Save filter state to sessionStorage
        function saveFilterState() {
            const openFilters = [];
            document.querySelectorAll('.filter-content').forEach(filter => {
                if (!filter.classList.contains('hidden')) {
                    openFilters.push(filter.id);
                }
            });
            sessionStorage.setItem(STORAGE_KEY, JSON.stringify(openFilters));
        }

        // Get current URL parameters
        function getCurrentParams() {
            const params = new URLSearchParams(window.location.search);
            return params.toString();
        }

        // Load more cameras
        async function loadMoreCameras() {
            if (isLoading || !hasMoreData) return;

            isLoading = true;
            showLoadingIndicator();

            try {
                const params = getCurrentParams();
                const separator = params ? '&' : '';
                const url = `${window.location.pathname}?${params}${separator}offset=${currentOffset}&load_more=1`;

                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                // Check if there's content
                if (data.html && data.html.trim().length > 0) {
                    // Append new cards to grid
                    const cameraGrid = document.getElementById('cameraGrid');
                    cameraGrid.insertAdjacentHTML('beforeend', data.html);

                    // Update offset for next load
                    currentOffset = data.nextOffset;
                    hasMoreData = data.hasMore;

                    // If no more data, show end message
                    if (!data.hasMore) {
                        showNoMoreResults();
                    }
                } else {
                    hasMoreData = false;
                    showNoMoreResults();
                }

            } catch (error) {
                console.error('Error loading more cameras:', error);
            } finally {
                isLoading = false;
                hideLoadingIndicator();
            }
        }

        // Show loading indicator
        function showLoadingIndicator() {
            const loader = document.getElementById('infiniteScrollLoader');
            if (loader) {
                loader.classList.remove('hidden');
            }
        }

        // Hide loading indicator
        function hideLoadingIndicator() {
            const loader = document.getElementById('infiniteScrollLoader');
            if (loader) {
                loader.classList.add('hidden');
            }
        }

        // Show no more results message
        function showNoMoreResults() {
            const message = document.getElementById('noMoreResults');
            if (message) {
                message.classList.remove('hidden');
            }
            // Remove scroll listener
            window.removeEventListener('scroll', handleScroll);
        }

        // Handle scroll event
        function handleScroll() {
            // Check if user is near bottom of page (within 300px)
            const scrollPosition = window.innerHeight + window.scrollY;
            const pageHeight = document.documentElement.scrollHeight;

            if (scrollPosition >= pageHeight - 300 && hasMoreData && !isLoading) {
                loadMoreCameras();
            }
        }

        // Setup infinite scroll
        function setupInfiniteScroll() {
            // Only setup if there are more cameras to load
            if (hasMoreData) {
                window.addEventListener('scroll', handleScroll);
            } else if (totalCount > 0) {
                // Show end message if all data already loaded
                showNoMoreResults();
            }
        }

        // Debounced search functionality
        let searchTimeout;
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                searchForm.submit();
            }, 1000);
        });

        // Preserve filter state before form submit
        document.getElementById('filterForm').addEventListener('submit', function() {
            saveFilterState();
        });

        // Back to Top functionality
        const backToTopButton = document.getElementById('backToTop');

        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        // Smooth scroll to top when clicked
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
