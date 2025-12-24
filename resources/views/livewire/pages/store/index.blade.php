<div>
    <livewire:components.app-bar type="default" />
    <div class="container mx-auto px-6! md:px-12! lg:px-4 mt-24 md:mt-28 lg:mt-36 lg:pb-0">
        <div class="py-4 md:py-6 px-4 md:px-8 border border-gray-300 rounded-xl">
            <div class="store_header flex items-center justify-between">
                <div class="flex gap-3 md:gap-4 items-center ">
                    <div class="store_logo w-14 md:w-18 lg:w-26 h-auto aspect-square rounded-full bg-gray-200">
                        <!-- <img src="" alt=""> -->
                    </div>
                    <div class="flex flex-col gap-.5 lg:gap-1.5">
                        <div class="store_name flex items-center gap-3">
                            <i class="fa-solid fa-store text-xs lg:text-lg"></i>
                            <p class="text-base md:text-lg lg:text-2xl font-bold">Store Name</p>
                        </div>
                        <div class="ratings_mobile lg:hidden">
                            <div class="flex items-center gap-1.5 text-gray-800">
                                <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                                <span class="text-sm font-semibold">4.8</span>
                                <span class="text-sm">(120)</span>
                                <span class="text-sm font-semibold">. 124</span>
                                <span class="text-sm">Terjual</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 -translate-y-1.5 hidden lg:block">Kota administrasi jakarta</p>
                        <div class="store_actions hidden lg:flex gap-2 items-center">
                            <x-button-primary variant="filled" size="sm" class="min-w-32">Follow</x-button-primary>
                            <x-button-primary variant="outlined" size="sm" class="min-w-32">Chat Penjual</x-button-primary>
                            <button class="py-2.5 px-3 rounded-lg border border-gray-400 hover:bg-gray-100 hover:cursor-pointer hover:border-gray-700 flex items-center justify-center"><i class="fa-solid fa-store text-xs text-gray-400"></i></button>
                            <button class="py-2.5 px-3 rounded-lg border border-gray-400 hover:bg-gray-100 hover:cursor-pointer hover:border-gray-700 flex items-center justify-center"><i class="fa-solid fa-share-nodes text-xs text-gray-400"></i></button>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="ratings_desktop hidden lg:block">
                        <div class="flex items-center gap-1.5 text-gray-800">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <span class="text-lg font-bold">4.8</span>
                            <span class="text-lg font-bold">(120 ulasan)</span>
                            <span class="text-lg font-bold">. 124 Terjual</span>
                        </div>
                        <span class="text-sm text-gray-500 inline-block -translate-y-1!">Rating & Ulasan</span>
                    </div>
                    <div class="ratings_mobile lg:hidden flex flex-col gap-1.5">
                        <x-button-primary variant="filled" size="sm" class="block! max-w-28 py-1! px-5! text-xs!">Follow</x-button-primary>
                        <x-button-primary variant="outlined" size="sm" class="block! max-w-28 py-1! px-5! text-xs!">Chat</x-button-primary>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile_filters lg:hidden flex items-center gap-2 mt-6">
            <div wire:click="openDrawer('filter')" class="flex items-center gap-2 py-1.5 px-3 rounded-lg border border-gray-300">
                <i class="fa-solid fa-sliders text-sm text-gray-500"></i>
                <p class="text-gray-500 text-sm">Filter</p>
            </div>
            <div wire:click="openDrawer('sort')" class="flex items-center gap-2 py-1.5 px-3 rounded-lg border border-gray-300">
                <p class="text-gray-500 text-sm">Terbaru</p>
                <i class="fa-solid fa-chevron-down text-sm text-gray-500"></i>
            </div>
            <div wire:click="openDrawer('category')" class="flex items-center gap-2 py-1.5 px-3 rounded-lg border border-gray-300">
                <p class="text-gray-500 text-sm">Etalase</p>
                <i class="fa-solid fa-chevron-down text-sm text-gray-500"></i>
            </div>
        </div>

        <x-bottom-drawer :open="$drawerOpen">
            @if($drawerOpen === 'filter')
            <div class="filter-drawer">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-3">Filter</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <div class="flex gap-2">
                                <input wire:model.live.debounce.500ms="min_price" type="number" placeholder="Min" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                <input wire:model.live.debounce.500ms="max_price" type="number" placeholder="Max" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <div wire:click="$set('rate', '4')" class="w-max flex items-center gap-2 py-1.5 px-3 rounded-full border border-gray-300 text-sm text-gray-500">Rating 4 keatas</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select wire:model="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                <option value="">Semua Kategori</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="fashion">Fashion</option>
                            </select>
                        </div>

                        <div class="mt-10">
                            <x-button-primary variant="filled" size="md" wire:click="filterProducts()" class="w-full">Terapkan Filter</x-button-primary>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($drawerOpen === 'sort')
            <div class="sort-drawer">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-3">Urutkan</h3>
                    <div class="space-y-2">
                        <div wire:click="setOrder('relevance')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-circle-check text-teal-600"></i>
                            <span>Paling Sesuai</span>
                        </div>
                        <div wire:click="setOrder('newest')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Terbaru</span>
                        </div>
                        <div wire:click="setOrder('highest_price')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Harga Tertinggi</span>
                        </div>
                        <div wire:click="setOrder('lowest_price')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Harga Terendah</span>
                        </div>
                        <div wire:click="setOrder('most_review')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Ulasan Terbanyak</span>
                        </div>
                        <div wire:click="setOrder('most_ordered')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Pembelian Terbanyak</span>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($drawerOpen === 'etalase')
            <div class="category-drawer">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-3">Etalase</h3>
                    <div class="space-y-2">
                        <div wire:click="setEtalase('all')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-circle-check text-teal-600"></i>
                            <span>Semua Produk</span>
                        </div>
                        <div wire:click="setEtalase('best_seller')" class="flex items-center gap-2 cursor-pointer">
                            <i class="fa-regular fa-circle text-gray-400"></i>
                            <span>Produk Terlaris</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </x-bottom-drawer>

        <div class="wrapper mt-6">
            <div class="tabs-wrapper hidden lg:flex border-b border-gray-300">
                <div class="px-6 py-2.5 relative">
                    <a href="" class="text-teal-700 font-semibold">Produk</a>
                    <div class="h-0.5 w-full bg-teal-700 absolute bottom-0 left-0"></div>
                </div>
                <div class="px-6 py-2.5 relative">
                    <a href="" class="text-gray-500 font-semibold">Ulasan</a>
                </div>
            </div>

            <div class="flex mt-6 gap-6">
                <div class="sidenav-wrapper w-1/5 hidden lg:block">
                    <!-- Component Start -->
                    <div class="flex flex-col items-center w-full overflow-hidden text-gray-700 shadow-md bg-gray-50 rounded-xl">
                        <div class="w-full px-4 py-4">
                            <div class="flex flex-col items-center w-full">
                                <a class="flex items-center w-full h-12 px-3 mt-2 rounded-lg hover:bg-gray-300" href="#">
                                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium">Semua Produk</span>
                                </a>
                                <a wire:click="$set('etalase', 'best_seller')" class="flex items-center w-full h-12 px-3 mt-2 bg-gray-200 rounded-lg" href="#">
                                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium">Produk Terlaris</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Component End  -->

                </div>
                <div class="content-wrapper w-full lg:w-4/5">
                    <div class="hidden lg:block ml-auto max-w-48 mb-6">
                        <div class="relative">
                            <div class="h-10 bg-white flex border border-gray-300 rounded-lg items-center">
                                <input value="Javascript" name="select" id="select" class="px-4 appearance-none outline-none text-gray-800 w-full" checked />

                                <button class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-gray-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <label for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-gray-600">
                                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="18 15 12 9 6 15"></polyline>
                                    </svg>
                                </label>
                            </div>

                            <input type="checkbox" name="show_more" id="show_more" class="hidden peer" checked />
                            <div class="absolute z-50 rounded-lg shadow bg-white overflow-hidden hidden peer-checked:flex flex-col w-full mt-1 border border-gray-300">
                                <div class="cursor-pointer group">
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 group-hover:bg-gray-100">Terbaru</a>
                                </div>
                                <div class="cursor-pointer group border-t border-gray-200">
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 border-teal-700 group-hover:bg-gray-100">Harga Terendah</a>
                                </div>
                                <div class="cursor-pointer group border-t border-gray-200">
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 group-hover:bg-gray-100">Harga Tertinggi</a>
                                </div>
                                <div class="cursor-pointer group border-t border-gray-200">
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 group-hover:bg-gray-100">Ulasan Terbanyak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-lg font-semibold mb-4 hidden lg:block">Semua Produk</h5>
                    <div class="grid gap-4 grid-cols-2 md:grid-cols-4 lg:grid-cols-5 dark:bg-gray-900">
                        <div class="w-full max-w-md bg-white rounded overflow-hidden transition-all">
                            <!-- Product Image Section -->
                            <div class="relative h-40 overflow-hidden bg-gray-100">
                                <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                            </div>

                            <!-- Product Details Section -->
                            <div class="pt-4">
                                <!-- Title -->
                                <h2 class="text-xs md:text-sm uppercase text-gray-900 leading-tight">SoundMax Pro X7 Wireless Noise-Cancelling</h2>


                                <!-- Price and CTA -->
                                <div class="flex flex-wrap lg:flex-nowrap my-1 items-center justify-between gap-4">
                                    <div class="price-container">
                                        <div class="flex items-center">
                                            <div class="text-base md:text-lg font-extrabold text-gray-900">
                                                Rp <span>279.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">5.0</span>
                                    <span class="text-gray-500 text-sm ml-1">.</span>
                                    <span class="text-gray-500 text-sm ml-1">135</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-md bg-white rounded overflow-hidden transition-all">
                            <!-- Product Image Section -->
                            <div class="relative h-40 overflow-hidden bg-gray-100">
                                <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                            </div>

                            <!-- Product Details Section -->
                            <div class="pt-4">
                                <!-- Title -->
                                <h2 class="text-xs md:text-sm uppercase text-gray-900 leading-tight">SoundMax Pro X7 Wireless Noise-Cancelling</h2>


                                <!-- Price and CTA -->
                                <div class="flex flex-wrap lg:flex-nowrap my-1 items-center justify-between gap-4">
                                    <div class="price-container">
                                        <div class="flex items-center">
                                            <div class="text-base md:text-lg font-extrabold text-gray-900">
                                                Rp <span>279.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">5.0</span>
                                    <span class="text-gray-500 text-sm ml-1">.</span>
                                    <span class="text-gray-500 text-sm ml-1">135</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-md bg-white rounded overflow-hidden transition-all">
                            <!-- Product Image Section -->
                            <div class="relative h-40 overflow-hidden bg-gray-100">
                                <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                            </div>

                            <!-- Product Details Section -->
                            <div class="pt-4">
                                <!-- Title -->
                                <h2 class="text-xs md:text-sm uppercase text-gray-900 leading-tight">SoundMax Pro X7 Wireless Noise-Cancelling</h2>


                                <!-- Price and CTA -->
                                <div class="flex flex-wrap lg:flex-nowrap my-1 items-center justify-between gap-4">
                                    <div class="price-container">
                                        <div class="flex items-center">
                                            <div class="text-base md:text-lg font-extrabold text-gray-900">
                                                Rp <span>279.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">5.0</span>
                                    <span class="text-gray-500 text-sm ml-1">.</span>
                                    <span class="text-gray-500 text-sm ml-1">135</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-md bg-white rounded overflow-hidden transition-all">
                            <!-- Product Image Section -->
                            <div class="relative h-40 overflow-hidden bg-gray-100">
                                <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                            </div>

                            <!-- Product Details Section -->
                            <div class="pt-4">
                                <!-- Title -->
                                <h2 class="text-xs md:text-sm uppercase text-gray-900 leading-tight">SoundMax Pro X7 Wireless Noise-Cancelling</h2>


                                <!-- Price and CTA -->
                                <div class="flex flex-wrap lg:flex-nowrap my-1 items-center justify-between gap-4">
                                    <div class="price-container">
                                        <div class="flex items-center">
                                            <div class="text-base md:text-lg font-extrabold text-gray-900">
                                                Rp <span>279.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">5.0</span>
                                    <span class="text-gray-500 text-sm ml-1">.</span>
                                    <span class="text-gray-500 text-sm ml-1">135</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-md bg-white rounded overflow-hidden transition-all">
                            <!-- Product Image Section -->
                            <div class="relative h-40 overflow-hidden bg-gray-100">
                                <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                            </div>

                            <!-- Product Details Section -->
                            <div class="pt-4">
                                <!-- Title -->
                                <h2 class="text-xs md:text-sm uppercase text-gray-900 leading-tight">SoundMax Pro X7 Wireless Noise-Cancelling</h2>


                                <!-- Price and CTA -->
                                <div class="flex flex-wrap lg:flex-nowrap my-1 items-center justify-between gap-4">
                                    <div class="price-container">
                                        <div class="flex items-center">
                                            <div class="text-base md:text-lg font-extrabold text-gray-900">
                                                Rp <span>279.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    <div class="flex text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">5.0</span>
                                    <span class="text-gray-500 text-sm ml-1">.</span>
                                    <span class="text-gray-500 text-sm ml-1">135</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:components.mobile-navbar path="/store" />
</div>