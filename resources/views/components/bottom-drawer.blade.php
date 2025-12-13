@props(['open' => ''])

<div>
    @if($open)
    <div class="fixed inset-0 bg-black/50 z-40" wire:click="closeDrawer"></div>
    @endif

    <div class="fixed bottom-0 left-0 right-0 z-50 bg-white rounded-t-2xl
        transition-transform duration-300
        {{ $open ? 'translate-y-0' : 'translate-y-full' }}">
        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>