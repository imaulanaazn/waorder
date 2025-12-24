<header class="fixed top-0 left-0 w-full z-50">
    <!-- for mobile -->
    <div class="lg:hidden">
        @if($page == 'cart')
        <div class="flex justify-between py-4 px-6! md:px-0 max-w-xl mx-auto bg-white border-b border-gray-200">
            <div class="flex gap-4 items-center">
                <a href=""><i class="fa-solid fa-arrow-left text-xl text-gray-700"></i></a>
                <span class="text-lg md:text-xl font-bold">
                    Keranjang
                </span>
            </div>
            <div class="flex gap-4 items-center">
                <button><i class="fa-regular fa-heart text-xl text-gray-700"></i></button>
                <button><i class="fa-solid fa-bars text-xl text-gray-700"></i></button>
            </div>
        </div>
        @else
        <livewire:components.default-navbar />
        @endif
    </div>

    <!-- for desktop -->
    <div class="hidden lg:block">
        <livewire:components.default-navbar />
    </div>
</header>