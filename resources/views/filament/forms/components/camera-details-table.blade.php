<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="cameraDetailsTable()" x-init="init()" style="display: flex; flex-direction: column; gap: 1rem;">

        {{-- Hidden Input for Livewire --}}
        <input type="hidden" wire:model="{{ $getStatePath() }}" />

        {{-- Add Button (Hidden in View Mode) --}}
        @if (!($isViewMode ?? false))
            <div style="display: flex; justify-content: flex-end;">
                <button type="button" @click.prevent="addItem()"
                    style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background-color: #f59e0b; color: #ffffff; font-size: 0.875rem; font-weight: 500; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                    @mouseenter="$el.style.backgroundColor='#d97706'" @mouseleave="$el.style.backgroundColor='#f59e0b'"
                    class="dark:!bg-amber-600 dark:hover:!bg-amber-700">
                    <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Image
                </button>
            </div>
        @endif

        {{-- Table Container --}}
        <div class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700"
            style="border-radius: 0.5rem; border: 1px solid; overflow: hidden; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="text-gray-500 dark:text-gray-400"
                            style="width: 4rem; padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                            No</th>
                        <th class="text-gray-500 dark:text-gray-400"
                            style="width: 8rem; padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                            Image</th>
                        <th class="text-gray-500 dark:text-gray-400"
                            style="width: 12rem; padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                            Type</th>
                        <th class="text-gray-500 dark:text-gray-400"
                            style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                            Description</th>
                        @if (!($isViewMode ?? false))
                            <th class="text-gray-500 dark:text-gray-400"
                                style="width: 6rem; padding: 0.75rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                                Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    <template x-for="(item, index) in items" :key="index">
                        <tr class="border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700"
                            style="border-top: 1px solid; transition: background-color 0.2s;">
                            {{-- No --}}
                            <td class="text-gray-900 dark:text-gray-100"
                                style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 500;"
                                x-text="index + 1"></td>

                            {{-- Image --}}
                            <td style="padding: 0.75rem 1rem;">
                                <template x-if="item.image">
                                    <button type="button" @click.prevent="openImageModal(item.image, index)"
                                        style="position: relative; display: block; border: none; background: none; padding: 0; cursor: pointer;">
                                        <img :src="getImageUrl(item.image)" :alt="'Image ' + (index + 1)"
                                            class="border-gray-200 dark:border-gray-600 hover:border-amber-500 dark:hover:border-amber-600"
                                            style="height: 5rem; width: 7rem; object-fit: cover; border-radius: 0.5rem; border: 2px solid; transition: all 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" />
                                        <div style="position: absolute; inset: 0; background-color: rgba(0, 0, 0, 0); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: background-color 0.2s;"
                                            @mouseenter="$el.style.backgroundColor='rgba(0, 0, 0, 0.2)'"
                                            @mouseleave="$el.style.backgroundColor='rgba(0, 0, 0, 0)'">
                                            <svg style="width: 1.5rem; height: 1.5rem; color: #ffffff; opacity: 0; transition: opacity 0.2s;"
                                                @mouseenter="$el.style.opacity='1'" @mouseleave="$el.style.opacity='0'"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </div>
                                    </button>
                                </template>
                                <template x-if="!item.image">
                                    <div class="bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600"
                                        style="height: 5rem; width: 7rem; border-radius: 0.5rem; border: 2px dashed; display: flex; align-items: center; justify-content: center;">
                                        <svg class="text-gray-400 dark:text-gray-500" style="width: 2rem; height: 2rem;"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </template>
                            </td>

                            {{-- Type --}}
                            <td style="padding: 0.75rem 1rem;">
                                <span x-text="getCaptureTypeName(item.capture_id)"
                                    class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200"
                                    style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500;"></span>
                            </td>

                            {{-- Description --}}
                            <td style="padding: 0.75rem 1rem;">
                                <p class="text-gray-600 dark:text-gray-300"
                                    style="font-size: 0.875rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"
                                    x-text="item.description || '-'"></p>
                            </td>

                            {{-- Actions (Hidden in View Mode) --}}
                            @if (!($isViewMode ?? false))
                                <td style="padding: 0.75rem 1rem;">
                                    <div
                                        style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                        <button type="button" @click.prevent="editItem(index)"
                                            class="text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20"
                                            style="padding: 0.375rem; background-color: transparent; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s;"
                                            title="Edit">
                                            <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button type="button" @click.prevent="confirmDelete(index)"
                                            class="text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20"
                                            style="padding: 0.375rem; background-color: transparent; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s;"
                                            title="Delete">
                                            <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    </template>

                    {{-- Empty State --}}
                    <template x-if="items.length === 0">
                        <tr>
                            <td :colspan="isViewMode ? 4 : 5" style="padding: 3rem 1rem; text-align: center;">
                                <svg class="text-gray-400 dark:text-gray-500"
                                    style="margin: 0 auto; width: 3rem; height: 3rem;" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400"
                                    style="margin-top: 0.5rem; font-size: 0.875rem;">No images added yet</p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        {{-- Edit Modal --}}
        <template x-teleport="body">
            <div x-show="editModal.open" x-cloak @click.self="closeEditModal()"
                style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; padding: 1rem; background-color: rgba(0, 0, 0, 0.6);">
                <div style="position: relative; width: 100%; max-width: 42rem; border-radius: 0.5rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2); margin: auto; background-color: white;"
                    class="dark:[background-color:rgb(17,24,39)]">
                    {{-- Header --}}
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.5rem; border-bottom: 1px solid rgb(229, 231, 235);"
                        class="dark:[border-bottom-color:rgb(55,65,81)]">
                        <h3 style="font-size: 1.125rem; font-weight: 600; margin: 0; color: rgb(17, 24, 39);"
                            class="dark:[color:rgb(255,255,255)]">
                            <span
                                x-text="editModal.index === null ? 'Add Image' : 'Edit Image #' + (editModal.index + 1)"></span>
                        </h3>
                        <button type="button" @click="closeEditModal()"
                            style="background: none; border: none; cursor: pointer; transition: color 0.2s; color: rgb(156, 163, 175);"
                            class="dark:[color:rgb(156,163,175)] dark:hover:[color:rgb(209,213,219)]"
                            @mouseenter="$el.style.color='rgb(75, 85, 99)'"
                            @mouseleave="$el.style.color='rgb(156, 163, 175)'">
                            <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    {{-- Body --}}
                    <div style="padding: 1rem 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
                        {{-- Image Upload --}}
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; color: rgb(55, 65, 81);"
                                class="dark:[color:rgb(209,213,219)]">
                                Image <span style="color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">*</span>
                            </label>
                            <input type="file" accept="image/*" @change="handleImageUpload($event)"
                                x-ref="imageInput"
                                :style="editModal.errors.image ?
                                    'display: block; width: 100%; font-size: 0.875rem; border-radius: 0.5rem; cursor: pointer; padding: 0.5rem; color: rgb(17, 24, 39); background-color: rgb(249, 250, 251); border: 1px solid rgb(220, 38, 38);' :
                                    'display: block; width: 100%; font-size: 0.875rem; border-radius: 0.5rem; cursor: pointer; padding: 0.5rem; color: rgb(17, 24, 39); background-color: rgb(249, 250, 251); border: 1px solid rgb(209, 213, 219);'"
                                :class="editModal.errors.image ?
                                    'dark:[color:rgb(243,244,246)] dark:[background-color:rgb(31,41,55)] dark:[border-color:rgb(220,38,38)]' :
                                    'dark:[color:rgb(243,244,246)] dark:[background-color:rgb(31,41,55)] dark:[border-color:rgb(75,85,99)]'" />
                            <template x-if="editModal.errors.image">
                                <p style="margin-top: 0.25rem; font-size: 0.75rem; font-weight: 500; color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">Please upload an image file</p>
                            </template>
                            <template x-if="editModal.data.image">
                                <img :src="getImageUrl(editModal.data.image)" alt="Preview"
                                    style="margin-top: 0.75rem; height: 8rem; width: auto; object-fit: cover; border-radius: 0.5rem; border: 1px solid rgb(229, 231, 235);"
                                    class="dark:[border-color:rgb(75,85,99)]" />
                            </template>
                        </div>

                        {{-- Capture Type --}}
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; color: rgb(55, 65, 81);"
                                class="dark:[color:rgb(209,213,219)]">
                                Capture Type <span style="color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">*</span>
                            </label>
                            <select x-model="editModal.data.capture_id" @change="editModal.errors.capture_id = false"
                                :style="editModal.errors.capture_id ?
                                    'display: block; width: 100%; border-radius: 0.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); padding: 0.5rem 0.75rem; background-color: white; color: rgb(17, 24, 39); border: 1px solid rgb(220, 38, 38);' :
                                    'display: block; width: 100%; border-radius: 0.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); padding: 0.5rem 0.75rem; background-color: white; color: rgb(17, 24, 39); border: 1px solid rgb(209, 213, 219);'"
                                :class="editModal.errors.capture_id ?
                                    'dark:[background-color:rgb(31,41,55)] dark:[color:rgb(243,244,246)] dark:[border-color:rgb(220,38,38)]' :
                                    'dark:[background-color:rgb(31,41,55)] dark:[color:rgb(243,244,246)] dark:[border-color:rgb(75,85,99)]'">
                                <option value="">Select type...</option>
                                @foreach ($captureTypes ?? [] as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <template x-if="editModal.errors.capture_id">
                                <p style="margin-top: 0.25rem; font-size: 0.75rem; font-weight: 500; color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">Please select a capture type</p>
                            </template>
                        </div>

                        {{-- Description --}}
                        <div>
                            <label
                                style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; color: rgb(55, 65, 81);"
                                class="dark:[color:rgb(209,213,219)]">
                                Description <span style="color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">*</span>
                            </label>
                            <textarea x-model="editModal.data.description" @input="editModal.errors.description = false" rows="4"
                                :style="editModal.errors.description ?
                                    'display: block; width: 100%; border-radius: 0.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); padding: 0.5rem 0.75rem; background-color: white; color: rgb(17, 24, 39); border: 1px solid rgb(220, 38, 38);' :
                                    'display: block; width: 100%; border-radius: 0.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); padding: 0.5rem 0.75rem; background-color: white; color: rgb(17, 24, 39); border: 1px solid rgb(209, 213, 219);'"
                                :class="editModal.errors.description ?
                                    'dark:[background-color:rgb(31,41,55)] dark:[color:rgb(243,244,246)] dark:[border-color:rgb(220,38,38)]' :
                                    'dark:[background-color:rgb(31,41,55)] dark:[color:rgb(243,244,246)] dark:[border-color:rgb(75,85,99)]'"
                                placeholder="Enter description for this image..."></textarea>
                            <template x-if="editModal.errors.description">
                                <p style="margin-top: 0.25rem; font-size: 0.75rem; font-weight: 500; color: rgb(220, 38, 38);"
                                    class="dark:[color:rgb(248,113,113)]">Please provide a description</p>
                            </template>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.75rem; padding: 1rem 1.5rem; border-top: 1px solid rgb(229, 231, 235); background-color: rgb(249, 250, 251);"
                        class="dark:[border-top-color:rgb(55,65,81)] dark:[background-color:rgb(31,41,55)]">
                        <button type="button" @click="closeEditModal()"
                            style="padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border: 1px solid rgb(209, 213, 219); border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s; color: rgb(55, 65, 81); background-color: white;"
                            class="dark:[color:rgb(209,213,219)] dark:[background-color:rgb(55,65,81)] dark:[border-color:rgb(75,85,99)] dark:hover:[background-color:rgb(75,85,99)]"
                            @mouseenter="$el.style.backgroundColor='rgb(249, 250, 251)'"
                            @mouseleave="$el.style.backgroundColor='white'">
                            Cancel
                        </button>
                        <button type="button" @click="saveEditModal()"
                            style="padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; color: #ffffff; background-color: #f59e0b; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s;"
                            @mouseenter="$el.style.backgroundColor='#d97706'"
                            @mouseleave="$el.style.backgroundColor='#f59e0b'"
                            class="dark:[background-color:rgb(217,119,6)] dark:hover:[background-color:rgb(180,83,9)]">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </template>

        {{-- Delete Confirmation Modal --}}
        <template x-teleport="body">
            <div x-show="deleteModal.open" x-cloak @click.self="closeDeleteModal()"
                style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background-color: rgba(0, 0, 0, 0.6);">
                <div
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; max-width: 28rem; padding: 0 1rem; box-sizing: border-box;">
                    <div style="background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);"
                        class="dark:!bg-gray-900">
                        {{-- Icon --}}
                        <div style="padding: 1.5rem; text-align: center;">
                            <div class="bg-red-100 dark:!bg-red-900/30"
                                style="margin: 0 auto; display: flex; align-items: center; justify-content: center; height: 3rem; width: 3rem; border-radius: 9999px;">
                                <svg class="text-red-600 dark:!text-red-400" style="height: 1.5rem; width: 1.5rem;"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="text-gray-900 dark:!text-white"
                                style="margin-top: 1rem; font-size: 1.125rem; font-weight: 600;">Delete Image</h3>
                            <p class="text-gray-600 dark:!text-gray-300"
                                style="margin-top: 0.5rem; font-size: 0.875rem;">
                                Are you sure you want to delete this image? This action cannot be undone.
                            </p>
                        </div>

                        {{-- Actions --}}
                        <div class="bg-gray-50 dark:!bg-gray-800"
                            style="display: flex; gap: 0.75rem; padding: 1rem 1.5rem; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                            <button type="button" @click="closeDeleteModal()"
                                class="text-gray-700 dark:!text-gray-300 bg-white dark:!bg-gray-700 border-gray-300 dark:!border-gray-600 hover:bg-gray-50 dark:hover:!bg-gray-600"
                                style="flex: 1; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border: 1px solid; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s;">
                                Cancel
                            </button>
                            <button type="button" @click="deleteItem()"
                                style="flex: 1; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; color: #ffffff; background-color: #dc2626; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.2s;"
                                @mouseenter="$el.style.backgroundColor='#b91c1c'"
                                @mouseleave="$el.style.backgroundColor='#dc2626'"
                                class="dark:!bg-red-700 dark:hover:!bg-red-800">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        {{-- Image Modal --}}
        <template x-teleport="body">
            <div x-show="imageModal.open" x-cloak @click.self="imageModal.open = false"
                style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; padding: 1rem; background-color: rgba(0, 0, 0, 0.9);">

                {{-- Close Button --}}
                <button @click="imageModal.open = false"
                    style="position: fixed; top: 1rem; right: 1rem; z-index: 10000; padding: 0.5rem; background-color: rgba(0, 0, 0, 0.5); color: #ffffff; border: none; border-radius: 9999px; cursor: pointer; transition: background-color 0.2s;"
                    @mouseenter="$el.style.backgroundColor='rgba(0, 0, 0, 0.7)'"
                    @mouseleave="$el.style.backgroundColor='rgba(0, 0, 0, 0.5)'">
                    <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Image Container --}}
                <div @click.away="imageModal.open = false"
                    style="position: relative; display: flex; align-items: center; justify-content: center; max-width: 90vw; max-height: 90vh; margin: auto;">

                    <div style="position: relative; background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2); overflow: hidden;"
                        class="dark:!bg-gray-900">
                        <img :src="imageModal.url" :alt="'Image ' + (imageModal.index + 1)"
                            style="max-width: 90vw; max-height: 90vh; width: auto; height: auto; object-fit: contain; display: block;" />

                        {{-- Image Counter --}}
                        <div
                            style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0)); padding: 1rem; pointer-events: none;">
                            <p style="color: #ffffff; font-size: 0.875rem; font-weight: 500; margin: 0; text-align: center;"
                                x-text="'Image #' + (imageModal.index + 1)"></p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    @script
        <script>
            Alpine.data('cameraDetailsTable', () => ({
                items: [],
                captureTypes: @js($captureTypes ?? []),
                isViewMode: @js($isViewMode ?? false),
                imageModal: {
                    open: false,
                    url: '',
                    index: null
                },
                editModal: {
                    open: false,
                    index: null,
                    data: {
                        image: null,
                        capture_id: '',
                        description: ''
                    },
                    errors: {
                        image: false,
                        capture_id: false,
                        description: false
                    }
                },
                deleteModal: {
                    open: false,
                    index: null
                },

                init() {
                    const state = $wire.get('{{ $getStatePath() }}');
                    this.items = Array.isArray(state) ? state : [];

                    this.$watch('items', (value) => {
                        $wire.set('{{ $getStatePath() }}', value);
                    });

                    console.log('Camera Details Table initialized', this.items);
                },

                openImageModal(image, index) {
                    this.imageModal.url = this.getImageUrl(image);
                    this.imageModal.index = index;
                    this.imageModal.open = true;
                },

                getImageUrl(image) {
                    if (!image) return '';
                    if (image.startsWith('http') || image.startsWith('data:')) return image;
                    return '/storage/' + image;
                },

                getCaptureTypeName(captureId) {
                    return this.captureTypes[captureId] || '-';
                },

                addItem() {
                    console.log('Add item clicked');
                    this.editModal.index = null;
                    this.editModal.data = {
                        image: null,
                        capture_id: '',
                        description: ''
                    };
                    this.editModal.errors = {
                        image: false,
                        capture_id: false,
                        description: false
                    };
                    this.editModal.open = true;
                },

                editItem(index) {
                    console.log('Edit item', index);
                    this.editModal.index = index;
                    this.editModal.data = JSON.parse(JSON.stringify(this.items[index]));
                    this.editModal.errors = {
                        image: false,
                        capture_id: false,
                        description: false
                    };
                    this.editModal.open = true;
                },

                confirmDelete(index) {
                    console.log('Confirm delete', index);
                    this.deleteModal.index = index;
                    this.deleteModal.open = true;
                },

                deleteItem() {
                    if (this.deleteModal.index !== null) {
                        this.items.splice(this.deleteModal.index, 1);
                        this.closeDeleteModal();
                    }
                },

                closeDeleteModal() {
                    this.deleteModal.open = false;
                    this.deleteModal.index = null;
                },

                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.editModal.data.image = e.target.result;
                            this.editModal.errors.image = false;
                        };
                        reader.readAsDataURL(file);
                    }
                },

                closeEditModal() {
                    this.editModal.open = false;
                    this.editModal.index = null;
                    this.editModal.data = {
                        image: null,
                        capture_id: '',
                        description: ''
                    };
                    this.editModal.errors = {
                        image: false,
                        capture_id: false,
                        description: false
                    };
                    if (this.$refs.imageInput) {
                        this.$refs.imageInput.value = '';
                    }
                },

                saveEditModal() {
                    this.editModal.errors = {
                        image: false,
                        capture_id: false,
                        description: false
                    };

                    let hasError = false;

                    if (!this.editModal.data.image) {
                        this.editModal.errors.image = true;
                        hasError = true;
                    }
                    if (!this.editModal.data.capture_id) {
                        this.editModal.errors.capture_id = true;
                        hasError = true;
                    }
                    if (!this.editModal.data.description || !this.editModal.data.description.trim()) {
                        this.editModal.errors.description = true;
                        hasError = true;
                    }

                    if (hasError) {
                        return;
                    }

                    if (this.editModal.index === null) {
                        this.items.push(JSON.parse(JSON.stringify(this.editModal.data)));
                    } else {
                        this.items[this.editModal.index] = JSON.parse(JSON.stringify(this.editModal.data));
                    }

                    this.closeEditModal();
                }
            }));
        </script>
    @endscript

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</x-dynamic-component>
