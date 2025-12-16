<!-- Barre de navigation mobile avec morphisme -->
<div class="lg:hidden fixed bottom-0 left-0 transform z-40 w-full">
    <div class="px-0 md:px-28 flex justify-between items-center p-3 px-6 bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-t-3xl shadow-lg border border-white/20 dark:border-gray-700/50">

        @if($path == '/')
        <!-- Accueil -->
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-regular fa-house text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Home</span>
        </a>

        <!-- Populaire -->
        <a href="" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-regular fa-circle-play text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Feed</span>
        </a>

        <!-- Accueil -->
        <a href="" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-solid fa-percent text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Promo</span>
        </a>

        <!-- Recherche -->
        <a href="" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-solid fa-receipt text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Transaksi</span>
        </a>

        <!-- Profil / Paramètres -->
        <a href="" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-regular fa-user text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Akun</span>
        </a>
        @elseif($path == '/store' || $path == '/store/reviews')
        <a href="" class="ml-6 flex flex-col items-center justify-center p-2 group">
            <i class="fa-solid fa-percent text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Produk</span>
        </a>

        <!-- Recherche -->
        <a href="" class="flex flex-col items-center justify-center p-2 group">
            <i class="fa-solid fa-receipt text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Etalase</span>
        </a>

        <!-- Profil / Paramètres -->
        <a href="" class="mr-6 flex flex-col items-center justify-center p-2 group">
            <i class="fa-regular fa-user text-xl text-gray-600 group-hover:text-white/60"></i>
            <span class="text-[10px] mt-1 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Reviews</span>
        </a>
        @endif
    </div>
</div>