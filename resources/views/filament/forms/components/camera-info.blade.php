<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    @if($camera)
    <div x-data="{ open: false }" class="border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800" style="border-radius: 0.5rem; border: 1px solid; overflow: hidden;">
        {{-- Header (Clickable) --}}
        <button 
            @click="open = !open" 
            type="button"
            class="bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800"
            style="width: 100%; padding: 1rem 1.5rem; border: none; cursor: pointer; text-align: left; display: flex; justify-content: space-between; align-items: center; transition: all 0.2s ease;">
            <div>
                <h3 class="text-gray-900 dark:text-white" style="font-size: 1rem; line-height: 1.5; font-weight: 600; margin: 0;">
                    {{ $camera->name }}
                </h3>
                @if($camera->noAsset)
                <p class="text-gray-600 dark:text-gray-400" style="font-size: 0.875rem; margin: 0.25rem 0 0 0;">
                    Asset: {{ $camera->noAsset }}
                </p>
                @endif
            </div>
            <svg 
                x-show="!open"
                class="text-gray-400 dark:text-gray-500"
                style="width: 1.25rem; height: 1.25rem; transition: transform 0.2s ease;" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            <svg 
                x-show="open"
                class="text-gray-400 dark:text-gray-500"
                style="width: 1.25rem; height: 1.25rem; transition: transform 0.2s ease;" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>

        {{-- Content (Collapsible) --}}
        <div 
            x-show="open" 
            x-collapse
            style="padding: 1.5rem;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; font-size: 0.875rem;">
                @if($camera->server)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Server</span>
                    <span class="text-gray-900 dark:text-white" style="font-weight: 500;">{{ $camera->server->name }}</span>
                </div>
                @endif

                @if($camera->brand)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Brand</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->brand->name }}</span>
                </div>
                @endif

                @if($camera->model)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Model</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->model }}</span>
                </div>
                @endif

                @if($camera->type)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Type</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->type->name }}</span>
                </div>
                @endif

                @if($camera->category)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Category</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->category->name }}</span>
                </div>
                @endif

                @if($camera->cameraVariant)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Variant</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->cameraVariant->name }}</span>
                </div>
                @endif

                @if($camera->lens)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Lens</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->lens }}</span>
                </div>
                @endif

                @if($camera->resolution)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Resolution</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->resolution }}</span>
                </div>
                @endif

                @if($camera->ipAddress)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">IP Address</span>
                    <span class="text-gray-700 dark:text-gray-300" style="font-family: 'Courier New', monospace;">{{ $camera->ipAddress }}</span>
                </div>
                @endif

                @if($camera->channel)
                <div style="display: flex; gap: 0.75rem;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Channel</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->channel }}</span>
                </div>
                @endif

                @if($camera->coordinate)
                <div style="display: flex; gap: 0.75rem; grid-column: span 2;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Coordinate</span>
                    <span class="text-gray-700 dark:text-gray-300" style="font-family: 'Courier New', monospace;">{{ $camera->coordinate }}</span>
                </div>
                @endif

                @if($camera->purpose)
                <div style="display: flex; gap: 0.75rem; grid-column: span 2;">
                    <span class="text-gray-500 dark:text-gray-400" style="font-weight: 500; min-width: 90px;">Purpose</span>
                    <span class="text-gray-900 dark:text-white">{{ $camera->purpose }}</span>
                </div>
                @endif
            </div>

            {{-- Location --}}
            @if($camera->location)
            <div class="border-gray-200 dark:border-gray-700" style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid;">
                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; font-size: 0.875rem;">
                    <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-200 dark:border-gray-600" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 0.375rem; font-weight: 500; border: 1px solid;">
                        📍 {{ $camera->location->name }}
                    </span>
                    @if($camera->location->company)
                    <span class="bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-800" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 0.375rem; font-weight: 500; border: 1px solid;">
                        🏢 {{ $camera->location->company->name }}
                    </span>
                    @endif
                    @if($camera->location->company)
                    <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 border-blue-200 dark:border-blue-800" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.375rem 0.75rem; border-radius: 0.375rem; font-weight: 500; border: 1px solid;">
                        🏭 {{ $camera->location->company->region->name }}
                    </span>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</x-dynamic-component>