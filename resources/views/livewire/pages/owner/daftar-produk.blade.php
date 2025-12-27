<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-3 bg-white rounded-t-2xl">
                    <dv class="flex items-center justify-between">
                        <h6 class="mb-0 text-lg md:mb-4">Table Produk</h6>
                        <div class="flex items-center gap-3">
                            <button wire:click="openDrawer('filter')" class="lg:hidden">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                            <button wire:click="openDrawer('filter')" class="lg:hidden">
                                <i class="fa-solid fa-plus font-medium"></i>
                            </button>
                            <div class="w-max hidden lg:block!">
                                <button class="py-1.5! px-4 rounded-lg bg-indigo-400! text-white! font-medium xl:font-semibold!">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </dv>

                    <div class="flex items-center justify-between flex-row mt-3 gap-3">
                        <div class="">
                            <div x-data="{ open: false, selected: 'Status' }" class="lg:hidden relative inline-block text-left w-full">
                                <button
                                    @click="open = !open"
                                    @keydown.escape.window="open = false"
                                    type="button"
                                    class="inline-flex w-full justify-between items-center gap-x-3 rounded-lg 
                                border border-gray-300 bg-white px-4 py-2 text-sm font-medium 
                                text-gray-700 hover:bg-gray-50 focus:outline-none 
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1"
                                    :class="{ 'ring-2 ring-indigo-500 ring-offset-1': open }">
                                    <span x-text="selected"></span>
                                    <svg class="h-5 w-5 text-gray-400"
                                        :class="open ? 'rotate-180 transform' : ''"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open"
                                    @click.away="open = false"
                                    x-transition
                                    class="absolute left-0 z-10 mt-2 w-full origin-top-left rounded-lg 
                                    bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1">
                                        <button @click="selected = 'Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Semua
                                        </button>
                                        <button @click="selected = 'Non Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Aktif
                                        </button>
                                        <button @click="selected = 'Non Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Stok Habis
                                        </button>
                                        <button @click="selected = 'Non Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Diarsipkan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ activeTab: 'all' }" class="w-full hidden lg:block">
                                <!-- Tab Headers -->
                                <div class="border-b border-gray-200">
                                    <nav class="-mb-px flex gap-4 justify-start" aria-label="Tabs">
                                        <button
                                            @click="activeTab = 'all'"
                                            :class="activeTab === 'all' 
                                        ? 'border-indigo-500! text-indigo-600!' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300!'"
                                            class="whitespace-nowrap py-2 px-1 border-b-2! font-medium text-sm transition-colors">
                                            Semua
                                        </button>
                                        <button
                                            @click="activeTab = 'active'"
                                            :class="activeTab === 'active' 
                                        ? 'border-indigo-500! text-indigo-600!' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                            class="whitespace-nowrap py-2 px-1 border-b-2! font-medium text-sm transition-colors">
                                            Aktif
                                        </button>

                                        <button
                                            @click="activeTab = 'outstock'"
                                            :class="activeTab === 'outstock' 
                                        ? 'border-indigo-500! text-indigo-600!' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                            class="whitespace-nowrap py-2 px-1 border-b-2! font-medium text-sm transition-colors">
                                            Stok Habis
                                        </button>
                                        <button
                                            @click="activeTab = 'archived'"
                                            :class="activeTab === 'archived' 
                                        ? 'border-indigo-500! text-indigo-600!' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                            class="whitespace-nowrap py-2 px-1 border-b-2! font-medium text-sm transition-colors">
                                            Diarsipan
                                        </button>
                                    </nav>
                                </div>
                                <!-- Tab Content -->
                                <!-- <div class="mt-6">
                                <div x-show="activeTab === 'profile'" class="animate-fade">
                                    <h3 class="text-lg font-medium">Profile Information</h3>
                                    <p class="mt-2 text-gray-600">Here you can update your personal information...</p>
                                </div>

                                <div x-show="activeTab === 'settings'" class="animate-fade">
                                    <h3 class="text-lg font-medium">Account Settings</h3>
                                    <p class="mt-2 text-gray-600">Manage your notification preferences and security...</p>
                                </div>

                                <div x-show="activeTab === 'billing'" class="animate-fade">
                                    <h3 class="text-lg font-medium">Billing & Payments</h3>
                                    <p class="mt-2 text-gray-600">View your subscription and payment history...</p>
                                </div>
                            </div> -->
                            </div>
                        </div>
                        <div class="flex items-center md:gap-3 max-md:flex-wrap">
                            <div x-data="{ open: false, selected: 'Status' }" class="relative hidden md:inline-block! text-left w-6/12 md:w-full md:max-w-42 max-md:pr-1.5">
                                <button
                                    @click="open = !open"
                                    @keydown.escape.window="open = false"
                                    type="button"
                                    class="inline-flex w-full justify-between items-center gap-x-3 rounded-lg 
                                border border-gray-300 bg-white px-4 py-2 text-sm font-medium 
                                text-gray-700 hover:bg-gray-50 focus:outline-none 
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1"
                                    :class="{ 'ring-2 ring-indigo-500 ring-offset-1': open }">
                                    <span x-text="selected"></span>
                                    <svg class="h-5 w-5 text-gray-400"
                                        :class="open ? 'rotate-180 transform' : ''"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open"
                                    @click.away="open = false"
                                    x-transition
                                    class="absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-lg 
                                    bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1">
                                        <button @click="selected = 'Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Aktif
                                        </button>
                                        <button @click="selected = 'Non Aktif'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Non Aktif
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ open: false, selected: 'Urutkan' }" class="relative hidden md:inline-block! text-left w-6/12 max-md:pl-1.5">
                                <button
                                    @click="open = !open"
                                    @keydown.escape.window="open = false"
                                    type="button"
                                    class="inline-flex w-full justify-between items-center gap-x-3 rounded-lg 
                                border border-gray-300 bg-white px-4 py-2 text-sm font-medium 
                                text-gray-700 hover:bg-gray-50 focus:outline-none 
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1"
                                    :class="{ 'ring-2 ring-indigo-500 ring-offset-1': open }">
                                    <span x-text="selected"></span>
                                    <svg class="h-5 w-5 text-gray-400"
                                        :class="open ? 'rotate-180 transform' : ''"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open"
                                    @click.away="open = false"
                                    x-transition
                                    class="absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-lg 
                                        bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1">
                                        <button @click="selected = 'Harga (asc)'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Harga (asc)
                                        </button>
                                        <button @click="selected = 'Harga (desc)'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Harga (desc)
                                        </button>
                                        <button @click="selected = 'Stok (asc)'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Stok (asc)
                                        </button>
                                        <button @click="selected = 'Stok (desc)'; open = false"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Stok (desc)
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="max-md:flex-1 relative w-full max-w-full md:max-w-48! lg:min-w-62!">
                                <input
                                    type="search"
                                    placeholder="Cari (nama, kode)..."
                                    class="w-full pl-9 pr-4 py-2! text-sm 
                                bg-white border border-gray-300 rounded-lg
                                focus:border-blue-500 focus:ring-1 focus:ring-blue-200
                                outline-none transition-all rounded-lg">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                                    <i class="fas fa-search text-gray-400 text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Foto Produk</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Produk</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">SKU / Kode</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Stok</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Statistik</th>
                                    <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-gray-200 text-xxs border-b-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 leading-normal text-sm">Produk 1</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Organization</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Produk1,Produk2..</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Rp 12.000</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">COD</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <div x-data="{ open: false }" class="flex items-center gap-3 justify-center">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input
                                                    type="checkbox"
                                                    x-model="open"
                                                    class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 rounded-full peer 
                                                    dark:bg-gray-700 dark:peer-focus:ring-blue-800 
                                                    peer-checked:after:translate-x-full! 
                                                    peer-checked:after:border-white 
                                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                                    after:bg-white after:border-gray-300 after:border 
                                                    after:rounded-full after:h-5 after:w-5 after:transition-all! 
                                                    dark:border-gray-600 peer-checked:bg-blue-600!"></div>
                                            </label>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                <span x-show="!open">Nonaktif</span>
                                                <span x-show="open" class="text-blue-600">Aktif</span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">230</span>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="javascript:;" class="font-semibold leading-tight text-sm text-orange-500! underline"> Edit </a>
                                        <span class="text-gray-300 px-1">|</span>
                                        <a href="javascript:;" class="font-semibold leading-tight text-sm text-rose-500! underline"> Hapus </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 leading-normal text-sm">Produk 1</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Developer</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Produk1,Produk2..</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">Rp 12.000</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <p class="font-semibold leading-tight text-xs text-slate-400 mb-0">COD</p>
                                    </td>
                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b-0 text-sm whitespace-nowrap shadow-transparent">
                                        <div x-data="{ open: false }" class="flex items-center gap-3 justify-center">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input
                                                    type="checkbox"
                                                    x-model="open"
                                                    class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 rounded-full peer 
                                                    dark:bg-gray-700 dark:peer-focus:ring-blue-800 
                                                    peer-checked:after:translate-x-full! 
                                                    peer-checked:after:border-white 
                                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                                    after:bg-white after:border-gray-300 after:border 
                                                    after:rounded-full after:h-5 after:w-5 after:transition-all! 
                                                    dark:border-gray-600 peer-checked:bg-blue-600!"></div>
                                            </label>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                <span x-show="!open">Nonaktif</span>
                                                <span x-show="open" class="text-blue-600">Aktif</span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">110</span>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="javascript:;" class="font-semibold leading-tight text-sm text-orange-500! underline"> Edit </a>
                                        <span class="text-gray-300 px-1">|</span>
                                        <a href="javascript:;" class="font-semibold leading-tight text-sm text-rose-500! underline"> Hapus </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-bottom-drawer :open="$drawerOpen">
        @if($drawerOpen === 'filter')
        <div class="filter-drawer">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-3">Filter</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select wire:model="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option value="">Urutan</option>
                            <option value="harga-asc">Harga (asc)</option>
                            <option value="harga-desc">Harga (desc)</option>
                            <option value="stok-asc">Stok (asc)</option>
                            <option value="stok-dsc">Stok (desc)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select wire:model="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option value="">Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </select>
                    </div>

                    <div class="mt-6 w-full">
                        <button class="py-1.5! px-4 rounded-lg bg-indigo-400! text-white font-medium lg:font-semibold! w-full">
                            Terapkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-bottom-drawer>
</div>