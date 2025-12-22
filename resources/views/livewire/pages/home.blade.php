<div>
    <section class="mt-24 md:mt-28 lg:mt-36 lg:pb-0">
        <div class="container mx-auto px-4">
            <div x-data="{            
                    slides: [                
                        {
                            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                            imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',                
                        },                
                        {                    
                            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',                    
                            imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',                
                        },                
                        {                    
                            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',                    
                            imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',                
                        },            
                    ],            
                    currentSlideIndex: 1,
                    previous() {                
                        if (this.currentSlideIndex > 1) {                    
                            this.currentSlideIndex = this.currentSlideIndex - 1                
                        } else {   
                            // If it's the first slide, go to the last slide           
                            this.currentSlideIndex = this.slides.length                
                        }            
                    },            
                    next() {                
                        if (this.currentSlideIndex < this.slides.length) {                    
                            this.currentSlideIndex = this.currentSlideIndex + 1                
                        } else {                 
                            // If it's the last slide, go to the first slide    
                            this.currentSlideIndex = 1                
                        }            
                    },        
                }" class="relative w-full overflow-hidden rounded-xl">

                <!-- previous button -->
                <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2! items-center justify-center bg-white/40 p-2 text-gray-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 " aria-label="previous slide" x-on:click="previous()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <!-- next button -->
                <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2! items-center justify-center bg-white/40 p-2 text-gray-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:outline-offset-0 " aria-label="next slide" x-on:click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                <!-- slides -->
                <!-- Change min-h-[50svh] to your preferred height size -->
                <div class="relative min-h-[20svh] lg:min-h-[40svh] w-full">
                    <template x-for="(slide, index) in slides">
                        <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                            <img class="absolute w-full h-full inset-0 object-cover text-on-surface dark:text-on-surface-dark" x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                        </div>
                    </template>
                </div>

                <!-- indicators -->
                <div class="absolute rounded-radius bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-surface/75 px-1.5 py-1 md:px-2 dark:bg-surface-dark/75" role="group" aria-label="slides">
                    <template x-for="(slide, index) in slides">
                        <button class="size-2 rounded-full transition bg-on-surface dark:bg-on-surface-dark" x-on:click="currentSlideIndex = index + 1" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-on-surface dark:bg-on-surface-dark' : 'bg-on-surface/50 dark:bg-on-surface-dark/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-6 lg:mt-10">
        <div class="container mx-auto px-4">
            <div class="wrapper rounded-xl border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800">Kategori Pilihan</h2>
                <div class="kategori flex items-center gap-3 mt-4 w-full overflow-scroll no-scrollbar">
                    @foreach(['Makanan', 'Minuman', 'Tas', 'Sepeda', 'Kapal', 'Motor', 'Laptop', 'Handphone', 'Elektronik', 'Buku', 'Fashion'] as $category)
                    <div class="bg-white rounded-full px-4 py-1.5 text-center border border-gray-300 flex items-center justify-center gap-1.5 hover:bg-gray-200 transition hover:cursor-pointer">
                        <i class="fa-solid fa-archway text-sm text-gray-500"></i>
                        <span class="text-base text-gray-600">{{ $category }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="mt-6 lg:mt-10">
        <div class="container mx-auto px-4">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Produk Terlaris</h2>
            <div class="grid gap-3 grid-cols-2 md:grid-cols-4 lg:grid-cols-6 dark:bg-gray-900">
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jakarta Pusat</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 md:mt-10 max-w-34 mx-auto text-center">
                <x-button-primary variant="outlined" size="sm">Lihat lainnya</x-button-primary>
            </div>
        </div>
        <div class="container mx-auto px-4">
            <h2 class="text-xl font-bold text-gray-800 mb-4 mt-6">Rekomendasi Untukmu</h2>
            <div class="grid gap-4 grid-cols-2 md:grid-cols-4 lg:grid-cols-6 dark:bg-gray-900">
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jakarta Pusat</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-md bg-white overflow-hidden transition-all">
                    <!-- Product Image Section -->
                    <div class="relative w-full h-auto aspect-square overflow-hidden bg-gray-100 rounded-lg">
                        <img src="https://images.pexels.com/photos/610945/pexels-photo-610945.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Wireless Headphones" class="w-full h-full object-cover transition-transform duration-700 ease-in-out transform hover:scale-110">
                        <div class="py-0.5 px-2 bg-white absolute top-0 right-0 rounded-bl-xl">
                            <span class="text-rose-500 font-semibold text-xs">-10%</span>
                        </div>
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
                            <span class="text-gray-500 text-sm ml-1">135 terjual</span>
                        </div>
                        <div class="alamat">
                            <span class="text-gray-500 text-sm">Kota Administrasi Jak..</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 md:mt-10 max-w-34 mx-auto text-center">
                <x-button-primary variant="outlined" size="sm">Lihat lainnya</x-button-primary>
            </div>
        </div>
    </section>
    <section class="py-12 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-10 md:mb-0">
                    <div class="text-center">
                        <h5 class="text-2xl xs:text-3xl lg:text-4xl xl:text-5xl mb-4">5,00+</h5><span class="text-base lg:text-lg text-gray-700">Barang</span>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-10 md:mb-0">
                    <div class="text-center">
                        <h5 class="text-2xl xs:text-3xl lg:text-4xl xl:text-5xl mb-4">2,500+</h5><span class="text-base lg:text-lg text-gray-700">Penjualan</span>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-10 sm:mb-0">
                    <div class="text-center">
                        <h5 class="text-2xl xs:text-3xl lg:text-4xl xl:text-5xl mb-4">10,000+</h5><span class="text-base lg:text-lg text-gray-700">Pengguna</span>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 px-4">
                    <div class="text-center">
                        <h5 class="text-2xl xs:text-3xl lg:text-4xl xl:text-5xl mb-4">10+</h5><span class="text-base lg:text-lg text-gray-700">Metode pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-4 bg-white">
        <div class="pt-16 pb-24 px-5 xs:px-8 xl:px-12 bg-lime-500 rounded-3xl">
            <div class="container mx-auto px-4">
                <div class="flex mb-4 items-center">
                    <svg width="8" height="8" viewbox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="4" cy="4" r="4" fill="#022C22"></circle>
                    </svg><span class="inline-block ml-2 text-sm font-medium">Solusi Belanja-mu</span>
                </div>
                <div class="border-t border-teal-900 border-opacity-25 pt-14">
                    <h1 class="font-heading text-4xl sm:text-6xl mb-24">Belanja gampang dan terpercaya</h1>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full sm:w-1/2 px-4 mb-16">
                            <div>
                                <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="white"></path>
                                    <circle cx="16" cy="16" r="4" fill="#022C22"></circle>
                                    <circle cx="24" cy="32" r="4" fill="#022C22"></circle>
                                    <circle cx="32" cy="16" r="4" fill="#022C22"></circle>
                                </svg>
                                <div class="mt-6">
                                    <h5 class="text-2xl font-medium mb-3">Pengiriman Cepat </h5>
                                    <p class="mb-6">Kami bekerja sama dengan kurir terpercaya untuk memberikan pengiriman cepat dan aman tanpa perlu repot.</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-4 mb-16">
                            <div>
                                <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="white"></path>
                                    <rect x="23" y="8" width="2" height="12" rx="1" fill="#022C22"></rect>
                                    <rect x="23" y="28" width="2" height="12" rx="1" fill="#022C22"></rect>
                                    <rect x="34.6066" y="11.9792" width="2" height="12" rx="1" transform="rotate(45 34.6066 11.9792)" fill="#022C22"></rect>
                                    <rect x="20.4645" y="26.1213" width="2" height="12" rx="1" transform="rotate(45 20.4645 26.1213)" fill="#022C22"></rect>
                                    <rect x="28" y="25" width="2" height="12" rx="1" transform="rotate(-90 28 25)" fill="#022C22"></rect>
                                    <rect x="8" y="25" width="2" height="12" rx="1" transform="rotate(-90 8 25)" fill="#022C22"></rect>
                                    <rect x="26.1213" y="27.5355" width="2" height="12" rx="1" transform="rotate(-45 26.1213 27.5355)" fill="#022C22"></rect>
                                    <rect x="11.9792" y="13.3934" width="2" height="12" rx="1" transform="rotate(-45 11.9792 13.3934)" fill="#022C22"></rect>
                                </svg>
                                <div class="mt-6">
                                    <h5 class="text-2xl font-medium mb-3">Barang berkualitas dan lengkap</h5>
                                    <p class="mb-6">Kami memberikan barang yang berkualitas dan lengkap sesuai dengan yang anda pesan. Semua yang anda butuhkan dapat anda temukan disini</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-4 mb-16 sm:mb-0">
                            <div>
                                <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="white"></path>
                                    <path d="M25 24C25 24.5523 24.5523 25 24 25C23.4477 25 23 24.5523 23 24C23 23.4477 23.4477 23 24 23C24.5523 23 25 23.4477 25 24Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 25C24.5523 25 25 24.5523 25 24C25 23.4477 24.5523 23 24 23C23.4477 23 23 23.4477 23 24C23 24.5523 23.4477 25 24 25Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40 23C40.5523 23 41 23.4477 41 24C41 33.3888 33.3888 41 24 41C23.4477 41 23 40.5523 23 40C23 39.4477 23.4477 39 24 39C32.2843 39 39 32.2843 39 24C39 23.4477 39.4477 23 40 23Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 9C15.7157 9 9 15.7157 9 24C9 24.5523 8.55228 25 8 25C7.44772 25 7 24.5523 7 24C7 14.6112 14.6112 7 24 7C24.5523 7 25 7.44772 25 8C25 8.55228 24.5523 9 24 9Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36 23C36.5523 23 37 23.4477 37 24C37 31.1797 31.1797 37 24 37C23.4477 37 23 36.5523 23 36C23 35.4477 23.4477 35 24 35C30.0751 35 35 30.0751 35 24C35 23.4477 35.4477 23 36 23Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 13C17.9249 13 13 17.9249 13 24C13 24.5523 12.5523 25 12 25C11.4477 25 11 24.5523 11 24C11 16.8203 16.8203 11 24 11C24.5523 11 25 11.4477 25 12C25 12.5523 24.5523 13 24 13Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32 23C32.5523 23 33 23.4477 33 24C33 28.9706 28.9706 33 24 33C23.4477 33 23 32.5523 23 32C23 31.4477 23.4477 31 24 31C27.866 31 31 27.866 31 24C31 23.4477 31.4477 23 32 23Z" fill="#022C22"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17C20.134 17 17 20.134 17 24C17 24.5523 16.5523 25 16 25C15.4477 25 15 24.5523 15 24C15 19.0294 19.0294 15 24 15C24.5523 15 25 15.4477 25 16C25 16.5523 24.5523 17 24 17Z" fill="#022C22"></path>
                                </svg>
                                <div class="mt-6">
                                    <h5 class="text-2xl font-medium mb-3">Gampang dan Aman</h5>
                                    <p class="mb-6">Cari barang apa aja, checkout dan bayar dengan mudah. Gak perlu capek capek gak perlu pusing, kami jamin barang anda sampai ke tangan anda dengan selamat</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-4">
                            <div>
                                <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="white"></path>
                                    <path d="M23.8425 12.3779C23.9008 12.238 24.0992 12.238 24.1575 12.3779L30.1538 26.7692C31.9835 31.1605 28.7572 36 24 36Lnan nanL24 36C19.2428 36 16.0165 31.1605 17.8462 26.7692L23.8425 12.3779Z" fill="#022C22"></path>
                                </svg>
                                <div class="mt-6">
                                    <h5 class="text-2xl font-medium mb-3">Bisa Return</h5>
                                    <p class="mb-6">Jika barang rusak atau tidak sesuai dengan yang anda pesan, anda dapat mengembalikan barang tersebut dengan mudah. Kami akan mengembalikan uang anda dengan cepat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-12 lg:py-24 bg-orange-50 overflow-hidden"><img class="absolute bottom-0 left-0" src="fauna-assets/footer/waves-lines-left-bottom.png" alt="" />
        <div class="container px-4 mx-auto relative">
            <div class="flex flex-wrap mb-16 -mx-4">
                <div class="w-full lg:w-2/12 xl:w-2/12 px-4 mb-16 lg:mb-0"><a class="inline-block mb-4" href="#"><img src="images/logo.svg" alt="" /></a></div>
                <div class="w-full md:w-7/12 lg:w-6/12 px-4 mb-16 lg:mb-0">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-1/2 xs:w-1/3 px-4 mb-8 xs:mb-0">
                            <h3 class="mb-6 font-bold">Platform</h3>
                            <ul>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Solutions</a></li>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">How it works</a></li>
                                <li><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Pricing</a></li>
                            </ul>
                        </div>
                        <div class="w-1/2 xs:w-1/3 px-4 mb-8 xs:mb-0">
                            <h3 class="mb-6 font-bold">Resources</h3>
                            <ul>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Blog</a></li>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Help Center</a></li>
                                <li><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Support</a></li>
                            </ul>
                        </div>
                        <div class="w-full xs:w-1/3 px-4">
                            <h3 class="mb-6 font-bold">Company</h3>
                            <ul>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">About</a></li>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Our Mission</a></li>
                                <li class="mb-4"><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Careers</a></li>
                                <li><a class="inline-block text-gray-600 hover:text-lime-500 font-medium" href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-5/12 lg:w-4/12 px-4">
                    <div class="max-w-sm p-8 bg-teal-900 rounded-2xl mx-auto md:mr-0">
                        <h5 class="text-xl font-medium text-white mb-4">Your Source for Green Energy Updates</h5>
                        <p class="text-sm text-white opacity-80 leading-normal mb-10">Stay in the loop with our Green Horizon newsletter, where we deliver bite-sized insights into the latest green energy solutions.</p>
                        <div class="flex flex-col">
                            <input class="h-12 w-full px-4 py-1 placeholder-gray-700 outline-none ring-offset-0 focus:ring-2 focus:ring-lime-500 shadow rounded-full" type="email" placeholder="Your e-mail..." /><a class="h-12 inline-flex mt-3 py-1 px-5 items-center justify-center font-medium text-teal-900 border border-lime-500 hover:border-white bg-lime-500 hover:bg-white rounded-full transition duration-200" href="#">Get in touch</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mb-3 justify-between">
                <div class="flex items-center mb-3"><a class="inline-block mr-4 text-black hover:text-lime-500" href="#">
                        <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_230_4832)">
                                <path d="M11.5481 19.9999V10.8776H14.6088L15.068 7.32147H11.5481V5.05138C11.5481 4.02211 11.8327 3.32067 13.3104 3.32067L15.1919 3.3199V0.139138C14.8665 0.0968538 13.7496 -9.15527e-05 12.4496 -9.15527e-05C9.735 -9.15527e-05 7.87654 1.65687 7.87654 4.69918V7.32147H4.80652V10.8776H7.87654V19.9999H11.5481Z" fill="currentColor"></path>
                            </g>
                        </svg></a> <a class="inline-block mr-4 text-black hover:text-lime-500" href="#">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 17.7383 21.3889 19.2135 20.3012 20.3012C19.2135 21.3889 17.7383 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 6.26174 2.61107 4.78649 3.69878 3.69878C4.78649 2.61107 6.26174 2 7.8 2ZM7.6 4C6.64522 4 5.72955 4.37928 5.05442 5.05442C4.37928 5.72955 4 6.64522 4 7.6V16.4C4 18.39 5.61 20 7.6 20H16.4C17.3548 20 18.2705 19.6207 18.9456 18.9456C19.6207 18.2705 20 17.3548 20 16.4V7.6C20 5.61 18.39 4 16.4 4H7.6ZM17.25 5.5C17.5815 5.5 17.8995 5.6317 18.1339 5.86612C18.3683 6.10054 18.5 6.41848 18.5 6.75C18.5 7.08152 18.3683 7.39946 18.1339 7.63388C17.8995 7.8683 17.5815 8 17.25 8C16.9185 8 16.6005 7.8683 16.3661 7.63388C16.1317 7.39946 16 7.08152 16 6.75C16 6.41848 16.1317 6.10054 16.3661 5.86612C16.6005 5.6317 16.9185 5.5 17.25 5.5ZM12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7ZM12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9Z" fill="currentColor"></path>
                        </svg></a> <a class="inline-block text-black hover:text-lime-500" href="#">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z" fill="currentColor"></path>
                        </svg></a></div>
                <p class="text-sm text-gray-500 mb-3">© 2024 Flow. All rights reserved.</p>
            </div>
        </div>
    </section>
    <livewire:components.mobile-navbar path="/" />
</div>