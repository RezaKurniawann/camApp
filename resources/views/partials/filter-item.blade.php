{{-- resources/views/partials/filter-item.blade.php --}}
@php
    $isMobile = isset($isMobile) && $isMobile;
    $formId = $isMobile ? 'mobileFilterForm' : 'filterForm';
@endphp

<div class="{{ isset($isLast) && $isLast ? '' : 'border-b border-gray-100' }}">
    <button type="button"
        class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-gray-800 bg-gray-50 hover:bg-gray-100 transition-colors filter-toggle"
        data-target="{{ $id }}">
        <span class="flex items-center gap-3">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="{{ $icon }}" />
            </svg>
            <span>{{ $title }}</span>
            @if (request($name) && count(request($name)) > 0)
                <span
                    class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">{{ count(request($name)) }}</span>
            @endif
        </span>
        <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-200"
            id="{{ $id }}Icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="{{ $id }}" class="px-3 pb-4 space-y-1 hidden filter-content">
        @foreach ($items as $item)
            <label
                class="flex items-center px-3 py-2.5 rounded-md hover:bg-blue-50 cursor-pointer transition-colors group">
                <input type="checkbox" name="{{ $name }}[]" value="{{ $item->id }}"
                    {{ in_array($item->id, request($name, [])) ? 'checked' : '' }}
                    {{ $isMobile ? '' : "onchange=\"document.getElementById('filterForm').submit()\"" }}
                    class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer">
                <span
                    class="ml-3 text-sm text-gray-700 group-hover:text-gray-900">{{ $item->name }}</span>
            </label>
        @endforeach
    </div>
</div>