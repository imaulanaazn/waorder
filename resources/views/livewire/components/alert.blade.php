@php
$bgClass = match($type) {
'success' => 'bg-green-600/95',
'error' => 'bg-red-600/95',
'warning' => 'bg-amber-600/95',
default => 'bg-blue-600/95'
};
@endphp

<div
    x-data="{ visible: @entangle('visible') }"
    x-show="visible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-5 right-5 z-[100] max-w-sm"
    x-init="
        $watch('visible', (value) => {
            if (value) {
                setTimeout(() => {
                    visible = false;
                    $wire.hide();  // also clean up Livewire state
                }, 4000);
            }
        })
    ">
    <div class="flex items-center gap-3 px-5 py-3 rounded-xl shadow-2xl text-sm font-medium text-white border border-white/20 backdrop-blur-sm 
    {{$bgClass}}">
        <!-- Optional small icon -->
        <svg class="w-5 h-5 opacity-90 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            @switch($type)
            @case('success')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> @break
            @case('error')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> @break
            @case('warning')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /> @break
            @default
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            @endswitch
        </svg>

        <span>{{ $message }}</span>

        <button @click="visible = false; $wire.hide()" class="ml-auto text-white/80 hover:text-white focus:outline-none">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>