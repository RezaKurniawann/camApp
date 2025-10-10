@foreach ($cameras as $camera)
    <a href="{{ route('camera.show', $camera->id) }}"
        class="group block bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 camera-card cursor-pointer border border-gray-100">

        <div class="relative aspect-square bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
            @if ($camera->images && !str_contains($camera->images, 'no-image'))
                <img src="{{ Storage::url($camera->images) }}" alt="{{ $camera->name }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    onerror="this.src='/images/no-image.png'">
            @else
                <img src="/images/no-image.png" alt="No Image"
                    class="w-full h-full object-cover opacity-50">
            @endif

            <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>

            <!-- Type Badge -->
            <div class="absolute top-3 right-3">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur-sm text-gray-800 shadow-sm">
                    {{ $camera->type->name ?? 'N/A' }}
                </span>
            </div>

            <!-- Category Badge -->
            <div class="absolute top-3 left-3">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-600/90 backdrop-blur-sm text-white shadow-sm">
                    {{ $camera->category->name ?? 'N/A' }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="p-5">
            <!-- Header Section -->
            <div class="mb-4">
                <div class="flex items-start justify-between gap-2 mb-2">
                    <h3
                        class="text-lg font-semibold text-blue-600 group-hover:text-blue-700 transition-colors">
                        {{ $camera->cameraVariant->name ?? 'N/A' }}
                    </h3>
                </div>
                <h4
                    class="text-base font-bold text-gray-900 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    {{ $camera->noAsset }} - {{ $camera->name }}
                </h4>
            </div>

            <!-- Divider -->
            <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent mb-4">
            </div>

            <!-- Details List -->
            <div class="space-y-2 text-sm">
                <div class="flex">
                    <span class="text-gray-500 w-23 flex-shrink-0">Company</span>
                    <span class="text-gray-500">:</span>
                    <span
                        class="text-gray-900 font-medium ml-2">{{ $camera->subLocation->location->company->name ?? 'N/A' }}</span>
                </div>

                <div class="flex">
                    <span class="text-gray-500 w-23 flex-shrink-0">Location</span>
                    <span class="text-gray-500">:</span>
                    <span
                        class="text-gray-900 font-medium ml-2">{{ $camera->subLocation->location->name ?? 'N/A' }}</span>
                </div>

                <div class="flex">
                    <span class="text-gray-500 w-23 flex-shrink-0">Sub Location</span>
                    <span class="text-gray-500">:</span>
                    <span
                        class="text-gray-900 font-medium ml-2">{{ $camera->subLocation->name ?? 'N/A' }}</span>
                </div>

                @if ($camera->purpose)
                    <div class="flex">
                        <span class="text-gray-500 w-23 flex-shrink-0">Purpose</span>
                        <span class="text-gray-500">:</span>
                        <span class="text-gray-900 font-medium ml-2">{{ $camera->purpose }}</span>
                    </div>
                @endif
            </div>
        </div>
    </a>
@endforeach