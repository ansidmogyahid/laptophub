<div class="px-10 flex">
    <div class="w-64 space-y-6 first:mt-0">
        <x-dropdown-filter open dropdownTitle="Brand">
            <div class="space-y-3">
                @foreach($brands as $brand)
                    <x-input.checkbox id="{{ $brand->id }}" :name="$brand->name" :value="$brand->name" :label="$brand->name" wire:model="brand" />
                @endforeach
            </div>
        </x-dropdown-filter>

        <x-dropdown-filter>
            <x-slot:dropdownTitle>Product Type</x-slot:dropdownTitle>
        </x-dropdown-filter>
    </div>

    <!-- Content -->
    <div class="flex-1 p-5">
        <div class="grid grid-cols-4 gap-4">
            <div class="inline-block p-3 border">
                <img src="https://p4-ofp.static.pub/ShareResource/na/products/yoga/400x300/lenovo-loq-15inch.png" alt="">
                <h3 class="font-semibold">LOQ (15" Intel) with RTX 3050</h3>
                <h4>$1,019.99</h4>

                <button class="w-full bg-indigo-600 hover:bg-indigo-500 transition-colors text-white py-1.5 rounded-md">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
