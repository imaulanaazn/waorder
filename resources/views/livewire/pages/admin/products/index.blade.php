<div class="w-full px-6 py-6 mx-auto">
    <x-modal :showModal="$showModal" title="Tambah Produk">
        <form role="form text-left">
            <div class="mb-4">
                <label for="text-sm">Name</label>
                <input type="text" wire:model="name" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="text-sm">Slug</label>
                <input type="text" wire:model="slug" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Slug" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="text-sm">Price</label>
                <input type="number" wire:model="price" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Price" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="text-sm">Stock</label>
                <input type="number" wire:model="stock" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Stock" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="text-sm">Description</label>
                <textarea wire:model="description" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Description" aria-describedby="email-addon"></textarea>
            </div>
            <div class="mb-4">
                <label for="text-sm">Image</label>
                <input type="file" wire:model="image" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Image" aria-describedby="password-addon">
            </div>
            <div class="mb-4">
                <label for="text-sm">Category</label>
                <select wire:model="category_id" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Category" aria-describedby="email-addon">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-3 justify-end">
                <div class="text-center">
                    <x-button type="outlined" action="closeModal">Batal</x-button>
                </div>
                <div class="text-center">
                    <x-button type="solid" action="save">Simpan</x-button>
                </div>
            </div>
        </form>
    </x-modal>

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="w-full flex justify-between items-center">
                        <h6>Products table</h6>
                        <button type="button" wire:click="openModal" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Tambah Produk</button>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Name</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Price</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Slug</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Stock</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Category</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Created At</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ $product->image }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{$product->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$product->price}}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$product->slug}}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$product->stock}}</p>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$product->category->name}}</p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{$product->created_at->format('d/m/Y')}}</span>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$product->is_active ? 'Active':'Not Active'}}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="javascript:;" class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>