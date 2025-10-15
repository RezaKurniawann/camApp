{{-- welcome.blade.php --}}
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

    <!-- Mobile Filters Component (Hidden on Desktop) -->
    @include('partials.mobile-filters')

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
            <!-- Desktop Sidebar Filters (Hidden on Mobile/Tablet) -->
            @include('partials.filters')

            <!-- Camera Grid -->
            <main class="flex-1 mt-0">
                @if ($cameras->count() > 0)
                    <div id="cameraGrid" class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
        let currentOffset = 12;
        let isLoading = false;
        let hasMoreData = {{ $totalCount > 12 ? 'true' : 'false' }};
        const totalCount = {{ $totalCount }};

        // Initialize filter states on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved filter states (Desktop only)
            const savedState = sessionStorage.getItem(STORAGE_KEY);
            if (savedState && window.innerWidth >= 1024) {
                const openFilters = JSON.parse(savedState);
                document.querySelectorAll('.filter-content').forEach(filter => {
                    filter.classList.add('hidden');
                    const icon = document.getElementById(filter.id + 'Icon');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                });
                openFilters.forEach(filterId => {
                    const filter = document.getElementById(filterId);
                    const icon = document.getElementById(filterId + 'Icon');
                    if (filter && icon) {
                        filter.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    }
                });
            } else if (window.innerWidth >= 1024) {
                document.querySelectorAll('.filter-content').forEach(filter => {
                    filter.classList.add('hidden');
                    const icon = document.getElementById(filter.id + 'Icon');
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                });
                const serverFilter = document.getElementById('serverFilter');
                const serverIcon = document.getElementById('serverFilterIcon');
                if (serverFilter && serverIcon) {
                    serverFilter.classList.remove('hidden');
                    serverIcon.classList.add('rotate-180');
                }
            }

            // Setup filter toggle event listeners (Desktop)
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

                if (data.html && data.html.trim().length > 0) {
                    const cameraGrid = document.getElementById('cameraGrid');
                    cameraGrid.insertAdjacentHTML('beforeend', data.html);

                    currentOffset = data.nextOffset;
                    hasMoreData = data.hasMore;

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

        function showLoadingIndicator() {
            const loader = document.getElementById('infiniteScrollLoader');
            if (loader) loader.classList.remove('hidden');
        }

        function hideLoadingIndicator() {
            const loader = document.getElementById('infiniteScrollLoader');
            if (loader) loader.classList.add('hidden');
        }

        function showNoMoreResults() {
            const message = document.getElementById('noMoreResults');
            if (message) message.classList.remove('hidden');
            window.removeEventListener('scroll', handleScroll);
        }

        function handleScroll() {
            const scrollPosition = window.innerHeight + window.scrollY;
            const pageHeight = document.documentElement.scrollHeight;

            if (scrollPosition >= pageHeight - 300 && hasMoreData && !isLoading) {
                loadMoreCameras();
            }
        }

        function setupInfiniteScroll() {
            if (hasMoreData) {
                window.addEventListener('scroll', handleScroll);
            } else if (totalCount > 0) {
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

        // Preserve filter state before form submit (Desktop)
        const desktopFilterForm = document.getElementById('filterForm');
        if (desktopFilterForm) {
            desktopFilterForm.addEventListener('submit', function() {
                saveFilterState();
            });
        }

        // Back to Top functionality
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>