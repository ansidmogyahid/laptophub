<div class="px-10 flex">
    <div>
        <button wire:click="clearFilters" class="text-sm border py-1.5 hover:bg-gray-100 px-3 mt-5 w-full rounded">Clear Filters</button>
        <div class="w-64 space-y-6 first:mt-0">
            @foreach($filters as $filterHeader => $modelFilters)
                <x-dropdown-filter open dropdownTitle="{{ $filterHeader }}">
                    <div class="space-y-3">
                        @foreach($modelFilters['modelFilters'] as $filter)
                            <x-input.checkbox
                                :id="$filter->name"
                                :name="$filter->name"
                                label="{{ $filter->name }} ({{ $filter->products_count }})"
                                :value="$filter->id"
                                wire:model.live="{{ $modelFilters['livewireModel'] }}" />
                        @endforeach
                    </div>
                </x-dropdown-filter>
            @endforeach
        </div>
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

            <div class="relative space-x-5">
                <button class="relative">
                    <span class="absolute font-semibold text-red-500 -top-2 -right-2">{{ $wishlist }}</span>
                    <x-heroicon-o-heart class="h-7" />
                </button>
                <button class="relative">
                    <span class="absolute font-semibold text-red-500 -top-2 -right-2">{{ $cart->count() }}</span>
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

                            <x-button title="Add to Cart" wire:click="addToCart({{ $product->id }})" />
                        </div>
                    </div>
                </form>
            @empty
                <div class="h-full flex items-center justify-center">
                    <div class="text-center items-center justify-center flex flex-col">
                        <svg class="text-gray-800" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="currentColor" d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h12.769q.69 0 1.153.463T20 5.616v12.769q0 .69-.462 1.153T18.384 20zm0-1h12.769q.269 0 .442-.173t.173-.442v-2.77h-3.577q-.557.95-1.46 1.476T12 17.616t-1.963-.525t-1.46-1.475H5v2.769q0 .269.173.442t.443.173M12 16.616q.8 0 1.494-.403t1.062-1.117q.13-.244.365-.362t.51-.118H19v-9q0-.27-.173-.443T18.385 5H5.615q-.269 0-.442.173T5 5.616v9h3.57q.274 0 .509.118t.365.362q.367.714 1.062 1.117t1.494.402M5.616 19H5h14z"/></svg>
                        <span class="font-semibold">No Product Found</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
