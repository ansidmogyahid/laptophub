<div class="px-10 flex">
    <div class="w-64 space-y-6 first:mt-0">
        <x-dropdown-filter open dropdownTitle="Brand">
            <div class="space-y-3">
                @foreach($brands as $brand)
                    <x-input.checkbox
                        :id="$brand->id"
                        :name="$brand->name"
                        :label="$brand->name"
                        :value="$brand->id"
                        wire:model.live="selectedBrands" />
                @endforeach
            </div>
        </x-dropdown-filter>
    </div>

    <!-- Content -->
    <div class="flex-1 p-5">

        <div class="flex items-center justify-between">
            <input type="text" wire:model.live="search" placeholder="Search product" class="mb-2">

            <div class="relative">
                <span class="absolute font-semibold text-red-500 -top-2 -right-2">0</span>
                <x-heroicon-o-shopping-cart class="h-7" />
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            @forelse($products as $product)
                <form wire:submit="addToCart">
                    <div class="inline-block p-3 border">
                        <img src="https://p4-ofp.static.pub/ShareResource/na/products/yoga/400x300/lenovo-loq-15inch.png" alt="">
                        <h3 class="font-semibold">{{ $product->name }}</h3>
                        <h4>${{ $product->price }}</h4>

                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 transition-colors text-white py-1.5 rounded-md">Add to Cart</button>
                    </div>
                </form>
            @empty
                <div>
                    <span>No Data</span>
                </div>
            @endforelse
        </div>
    </div>
</div>
