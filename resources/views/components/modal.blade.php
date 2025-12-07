@if ($showModal)
<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div
            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5>{{ $title }}</h5>
            </div>
            <div class="flex-auto px-6 pt-6">
                {{ $slot }}
            </div>

            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
@endif