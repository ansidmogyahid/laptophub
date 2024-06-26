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

            <div class="flex items-center mb-2">
                <input type="text" wire:model.live="search" placeholder="Search product">

                <div class="flex items-center space-x-2 ml-2">
                    <x-input.radiobox id="default-radio-1" name="layout" value="list" radioIcon :showRadioBox="false" wire:model.live="layout">
                        <x-slot:content> <x-heroicon-o-queue-list class="h-10" /> </x-slot:content>
                    </x-input.radiobox>

                    <x-input.radiobox id="default-radio-2" name="layout" value="grid" :showRadioBox="false"  wire:model.live="layout">
                        <x-slot:content> <x-heroicon-o-view-columns class="h-10" /> </x-slot:content>
                    </x-input.radiobox>
                </div>
            </div>

            <div class="relative">
                <button>
                    <span class="absolute font-semibold text-red-500 -top-2 -right-2">0</span>
                    <x-heroicon-o-shopping-cart class="h-7" />
                </button>
            </div>
        </div>

        <div class="grid gap-4 {{ $layout == 'list' ? 'grid-cols-3' : 'grid-cols-4' }}" >
            @forelse($products as $product)
                <form wire:submit="addToCart">
                    <div class="p-3 border {{ $layout == 'list' ? 'flex' : '' }}">
                        <img class="h-40" src="https://p4-ofp.static.pub/ShareResource/na/products/yoga/400x300/lenovo-loq-15inch.png" alt="">
                        <div>
                            <h3 class="font-semibold">{{ $product->name }}</h3>
                            <h4>${{ $product->price }}</h4>

                            <button type="submit" class="w-full px-5 bg-indigo-600 hover:bg-indigo-500 transition-colors text-white py-1.5 rounded-md">Add to Cart</button>
                        </div>
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
