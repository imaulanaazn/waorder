<div class="container mx-auto px-6! md:px-12! lg:px-4">
    <div class="mt-28 md:mt-30 lg:mt-34 py-4 md:py-6 px-4 md:px-8 border border-gray-300 rounded-xl">
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

    <div class="mt-4 md:mt-6 lg:mt-6 bg-white rounded-lg py-4 md:py-6 px-4 md:px-8 border border-gray-300 rounded-xl grid grid-cols-1 lg:grid-cols-5 gap-6">
        <div class="lg:col-span-1 col-span-1">
            <div class="flex gap-1 items-center">
                <i class="fa-solid fa-star text-xl text-yellow-400"></i>
                <p class="text-3xl font-bold text-gray-800">5.0<span class="text-lg text-gray-500 font-medium">/ 5.0</span></p>
            </div>
            <p class="text-lg">99.9% pembeli merasa puas</p>
            <p class="text-sm text-gray-500">123 rating . 120 ulasan</p>
        </div>
        <div class="lg:col-span-4 hidden lg:flex lg:flex-row flex-col space-y-4 space-x-10">
            <div class="w-full max-w-64">
                <div class="flex items-center max-w-64">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                        <span class="text-sm font-medium text-blue-600 hover:underline shrink-0">5</span>
                    </div>
                    <div class="w-3/4 h-1.5 mx-2 bg-gray-200 rounded">
                        <div class="h-1.5 bg-teal-700 rounded" style="width: 25%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">(0)</span>
                </div>
                <div class="flex items-center max-w-64">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                        <span class="text-sm font-medium text-blue-600 hover:underline shrink-0">4</span>
                    </div>
                    <div class="w-3/4 h-1.5 mx-2 bg-gray-200 rounded">
                        <div class="h-1.5 bg-teal-700 rounded" style="width: 25%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">(0)</span>
                </div>
                <div class="flex items-center max-w-64">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                        <span class="text-sm font-medium text-blue-600 hover:underline shrink-0">3</span>
                    </div>
                    <div class="w-3/4 h-1.5 mx-2 bg-gray-200 rounded">
                        <div class="h-1.5 bg-teal-700 rounded" style="width: 10%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">(0)</span>
                </div>
            </div>
            <div class="w-full max-w-64">
                <div class="flex items-center max-w-64">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                        <span class="text-sm font-medium text-blue-600 hover:underline shrink-0">2</span>
                    </div>
                    <div class="w-3/4 h-1.5 mx-2 bg-gray-200 rounded">
                        <div class="h-1.5 bg-teal-700 rounded" style="width: 5%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">(0)</span>
                </div>
                <div class="flex items-center max-w-64">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-star text-xs text-yellow-400"></i>
                        <span class="text-sm font-medium text-blue-600 hover:underline shrink-0">1</span>
                    </div>
                    <div class="w-3/4 h-1.5 mx-2 bg-gray-200 rounded">
                        <div class="h-1.5 bg-teal-700 rounded" style="width: 10%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-500">(0)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper mt-8">
        <div class="tabs-wrapper hidden lg:flex border-b border-gray-300">
            <div class="px-6 py-2.5 relative">
                <a href="" class="text-teal-700 font-semibold">Produk</a>
                <div class="h-0.5 w-full bg-teal-700 absolute bottom-0 left-0"></div>
            </div>
            <div class="px-6 py-2.5 relative">
                <a href="" class="text-gray-500 font-semibold">Ulasan</a>
            </div>
        </div>

        <div class="flex mt-8 gap-12">
            <div class="sidenav-wrapper w-1/5 hidden lg:block">
                <!-- Component Start -->
                <div class="flex flex-col items-center w-full overflow-hidden text-gray-700 shadow-md bg-gray-50 rounded-xl">
                    <div class="w-full px-4 py-4">
                        <div class="flex flex-col items-start w-full">
                            <h4 class="text-lg font-semibold mb-6">Filter Ulasan</h4>
                            <div class="mb-6">
                                <h5 class="text-medium font-semibold mb-2 text-gray-700">Media</h5>
                                <div class="flex gap-2 items-center">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-sm">Dengan Media</label>
                                </div>
                            </div>
                            <div class="mb-6">
                                <h5 class="text-medium font-semibold mb-2 text-gray-700">Rating</h5>
                                <div class="flex gap-2.5 items-center mb-2">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-base"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>1</label>
                                </div>
                                <div class="flex gap-2.5 items-center mb-2">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-base"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>2</label>
                                </div>
                                <div class="flex gap-2.5 items-center mb-2">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-base"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>3</label>
                                </div>
                                <div class="flex gap-2.5 items-center mb-2">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-base"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>4</label>
                                </div>
                                <div class="flex gap-2.5 items-center mb-2">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="with-media" class="sr-only peer">
                                            <div class="w-5 h-5 bg-white rounded-md peer-checked:bg-lime-600 transition-all duration-300 border-2 border-gray-600 peer-checked:border-lime-600"></div>

                                            <i class="fa-solid fa-check absolute w-1 h-1 text-white left-0 top-0 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"></i>
                                        </div>
                                    </label>
                                    <label for="with-media" class="text-base"><i class="fa-solid fa-star text-yellow-400 mr-1"></i>5</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Component End  -->

            </div>
            <div class="content-wrapper w-full lg:w-4/5">
                <div class="flex">
                    <h5 class="text-lg font-semibold mb-4 hidden lg:block">Ulasan Pilihan</h5>


                    <div class="hidden lg:block ml-auto max-w-48 mb-6">
                        <div class="relative">
                            <div class="h-10 bg-white flex border border-gray-300 rounded-lg items-center">
                                <input value="Terbaru" name="select" id="select" class="px-4 appearance-none outline-none text-gray-800 w-full" checked />

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
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 border-teal-700 group-hover:bg-gray-100">Rating Terendah</a>
                                </div>
                                <div class="cursor-pointer group border-t border-gray-200">
                                    <a class="block p-2 border-transparent border-l-4 group-hover:border-teal-700 group-hover:bg-gray-100">Rating Tertinggi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <!-- Review items will be loaded here -->
                    @foreach(['review1', 'review2'] as $review )
                    <div class="flex flex-col md:flex-row gap-2 md:gap-10 py-6 border-b border-gray-100">
                        <div class="flex-1">
                            <div class="bg-gray-200 rounded-md w-14 h-auto aspect-square"><img src="" alt=""></div>
                            <p class="text-base font-bold text-gray-800 mt-2">Lorem ipsum dolor sit amet elit. </p>
                        </div>
                        <div class="flex-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-0.5">
                                    <i class="fa-solid fa-star text-sm text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-sm text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-sm text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-sm text-yellow-400"></i>
                                    <i class="fa-solid fa-star text-sm text-yellow-400"></i>
                                </div>
                                <span class="text-sm text-gray-500">Hari ini</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="profile w-10 h-auto aspect-square bg-gray-200 rounded-full mt-2 flex items-center justify-center">
                                    <i class="fa-regular fa-user text-gray-500"></i>
                                </div>
                                <span class="mt-2 font-medium text-gray-800">John Doe</span>
                            </div>
                            <p class="mt-2 text-gray-600">This is a sample review text to demonstrate the layout and spacing of the review content.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <livewire:components.mobile-navbar path="/store/reviews" />
</div>