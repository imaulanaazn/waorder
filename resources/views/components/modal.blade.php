@if ($showModal)
<div class="fixed z-50 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div
            class="w-full inline-block align-bottom bg-white rounded-lg md:rounded-2xl! px-4 pt-5 pb-4 md:px-6! text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full lg:max-w-2xl! sm:p-6">
            <div class="p-3 md:p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5>{{ $title }}</h5>
            </div>
            <div class="flex-auto">
                {{ $slot }}
            </div>

            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
@endif