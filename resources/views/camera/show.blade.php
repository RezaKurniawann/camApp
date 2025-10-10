<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $camera->name }} - Camera Detail</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <x-header />

    <!-- Main Content -->
    <div class="bg-white">
        <!-- Camera Image with Back Button -->
        <div class="relative bg-gray-100" style="height: 515px;">
            <!-- Back Button -->
            <a href="{{ url('/') }}"
                class="absolute top-4 left-4 z-10 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition-colors">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            
            <!-- Image -->
            <div class="h-full flex items-center justify-center">
                @if ($camera->images && !str_contains($camera->images, 'no-image'))
                    <img src="{{ Storage::url($camera->images) }}" alt="{{ $camera->name }}"
                        class="h-full w-auto object-cover" onerror="this.src='/images/no-image.png'">
                @else
                    <img src="/images/no-image.png" alt="No Image" class="h-full w-auto object-cover">
                @endif
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Header Info -->
            <div class="mb-6">
                <p class="text-gray-600 text-sm mb-1">{{ $camera->noAsset }} - {{ $camera->brand->name ?? 'N/A' }}</p>
                <h2 class="text-2xl font-bold text-gray-900">{{ $camera->name }}</h2>
            </div>

            <!-- Two Column Layout -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Camera Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b-2 border-blue-600">Camera
                        Information</h3>
                    <div class="space-y-3">
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Asset No</span>
                            <span class="text-gray-900">: {{ $camera->noAsset }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Camera Name</span>
                            <span class="text-gray-900">: {{ $camera->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Brand</span>
                            <span class="text-gray-900">: {{ $camera->brand->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Model</span>
                            <span class="text-gray-900">: {{ $camera->model ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Lens</span>
                            <span class="text-gray-900">: {{ $camera->lens ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Resolution</span>
                            <span class="text-gray-900">: {{ $camera->resolution ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Variant</span>
                            <span class="text-gray-900">: {{ $camera->cameraVariant->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Type</span>
                            <span class="text-gray-900">: {{ $camera->type->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">IP Address</span>
                            <span class="text-gray-900">: {{ $camera->ipAddress ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Channel</span>
                            <span class="text-gray-900">: {{ $camera->channel ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Company</span>
                            <span class="text-gray-900">:
                                {{ $camera->subLocation->location->company->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Location</span>
                            <span class="text-gray-900">:
                                {{ $camera->subLocation->location->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Sub Location</span>
                            <span class="text-gray-900">: {{ $camera->subLocation->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Coordinate</span>
                            <span class="text-gray-900">: {{ $camera->coordinate ?? '-' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Category</span>
                            <span class="text-gray-900">: {{ $camera->category->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Purpose</span>
                            <span class="text-gray-900">: {{ $camera->purpose ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Server Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b-2 border-blue-600">Server
                        Information</h3>
                    <div class="space-y-3">
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Asset No</span>
                            <span class="text-gray-900">: {{ $camera->server->noAsset ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Server Name</span>
                            <span class="text-gray-900">: {{ $camera->server->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Server Type</span>
                            <span class="text-gray-900">: {{ $camera->server->type->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Brand</span>
                            <span class="text-gray-900">: {{ $camera->server->brand->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Model</span>
                            <span class="text-gray-900">: {{ $camera->server->model ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Port Available</span>
                            <span class="text-gray-900">: {{ $camera->server->portAvailable ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Port Use</span>
                            <span class="text-gray-900">: {{ $camera->server->portUse ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">HDD Size</span>
                            <span class="text-gray-900">: {{ $camera->server->hddSize ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">IP Address</span>
                            <span class="text-gray-900">: {{ $camera->server->ipAddress ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Company</span>
                            <span class="text-gray-900">:
                                {{ $camera->server->subLocation->location->company->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Location</span>
                            <span class="text-gray-900">:
                                {{ $camera->server->subLocation->location->name ?? 'N/A' }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-medium text-gray-700 w-40">Sub Location</span>
                            <span class="text-gray-900">: {{ $camera->server->subLocation->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            @if ($camera->cameraDetails && $camera->cameraDetails->count() > 0)
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b-2 border-blue-600">Additional
                        Details</h3>

                    @php
                        // Group details by capture type
                        $groupedDetails = [];
                        foreach ($camera->cameraDetails as $detail) {
                            if (is_array($detail->details)) {
                                foreach ($detail->details as $item) {
                                    // Get capture info from capture_id
                                    $captureId = $item['capture_id'] ?? null;
                                    $capture = null;

                                    if ($captureId) {
                                        $capture = \App\Models\Capture::find($captureId);
                                    }

                                    $captureType = $capture ? $capture->name : 'Other';

                                    if (!isset($groupedDetails[$captureType])) {
                                        $groupedDetails[$captureType] = [];
                                    }

                                    $groupedDetails[$captureType][] = $item;
                                }
                            }
                        }
                    @endphp

                    @if (count($groupedDetails) > 0)
                        @foreach ($groupedDetails as $captureType => $details)
                            <div class="mb-6">
                                <h4 class="text-md font-semibold text-gray-800 mb-3 pb-2 border-b">
                                    Capture Type - {{ ucfirst($captureType) }}
                                </h4>

                                <!-- Image Gallery -->
                                <div class="relative">
                                    <div class="flex overflow-x-auto gap-4 pb-4 scrollbar-hide"
                                        id="gallery-{{ Str::slug($captureType) }}">
                                        @foreach ($details as $detail)
                                            @if (isset($detail['image']) && $detail['image'])
                                                <div class="flex-shrink-0 w-48">
                                                    <div
                                                        class="bg-gray-100 rounded-lg overflow-hidden aspect-square">
                                                        <img src="{{ Storage::url($detail['image']) }}"
                                                            alt="{{ $detail['description'] ?? $captureType }}"
                                                            class="w-full h-full object-cover cursor-pointer hover:opacity-90 transition-opacity"
                                                            onclick="openImageModal('{{ Storage::url($detail['image']) }}', '{{ $detail['description'] ?? '' }}')"
                                                            onerror="this.src='/images/no-image.png'">
                                                    </div>
                                                    @if (isset($detail['description']))
                                                        <p class="text-xs text-gray-600 mt-1 truncate">
                                                            {{ $detail['description'] }}</p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <!-- Navigation Buttons -->
                                    @if (count($details) > 4)
                                        <button onclick="scrollGallery('{{ Str::slug($captureType) }}', -1)"
                                            class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow-lg z-10">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button onclick="scrollGallery('{{ Str::slug($captureType) }}', 1)"
                                            class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow-lg z-10">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="bg-gray-50 rounded-lg p-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-600">No capture images available</p>
                        </div>
                    @endif
                </div>

                <!-- Image Modal -->
                <div id="imageModal"
                    class="fixed inset-0 bg-black bg-opacity-90 opacity-0 invisible transition-all duration-300 z-50 flex items-center justify-center p-4"
                    onclick="closeImageModal()">
                    <div class="relative w-full h-full flex flex-col items-center justify-center">
                        <button onclick="closeImageModal()"
                            class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div
                            class="relative max-w-7xl max-h-full w-full h-full flex items-center justify-center p-12">
                            <img id="modalImage" src="" alt="Full size"
                                class="max-w-full max-h-full w-auto h-auto object-contain rounded-lg"
                                onclick="event.stopPropagation()">
                        </div>
                        <p id="modalDescription" class="text-white text-center mt-4 text-lg absolute bottom-4">
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <x-footer />

    <script>
        // Gallery scroll function
        function scrollGallery(galleryId, direction) {
            const gallery = document.getElementById('gallery-' + galleryId);
            const scrollAmount = 208; // width of image (192px) + gap (16px)
            gallery.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        // Image modal functions
        function openImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.classList.remove('opacity-0', 'invisible');
            modal.classList.add('opacity-100', 'visible');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('opacity-0', 'invisible');
            modal.classList.remove('opacity-100', 'visible');
            document.body.style.overflow = 'auto';
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
</body>

</html>