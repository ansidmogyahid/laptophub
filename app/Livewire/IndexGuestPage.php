<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Processor;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use App\SeeMore;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

#[Layout('layouts.guest')]
class IndexGuestPage extends Component
{
    use SeeMore;
    public string $search = '';

    public array $selectedBrands = [];
    public array $productTypes = [];
    public array $processors = [];

    public string $layout = 'grid';


    protected function queryString()
    {
        return [
            'search' => ['as' => 'q', 'except' => ''],
            'selectedBrands' => ['as' => 'brand', 'except' => []],
            'productTypes' => ['as' => 'type', 'except' => []],
            'layout' => ['as' => 'layoutView', 'except' => '']
        ];
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedBrands = [];
        $this->layout = 'grid';

        dd($this->selectedBrands);
    }

    public function updatedLayout($value)
    {
        if(in_array($value, ['list', 'grid'])){
            $this->layout = $value;
        }
    }

    public function updatedSelectedBrands($property, $value)
    {
        $this->getProducts();
    }

    public function getProducts()
    {
        return Product::where('name', 'LIKE', "%{$this->search}%" ?? '')
            ->when($this->selectedBrands, fn ($query) => $query->whereIn('brand_id', $this->selectedBrands))
            ->when($this->productTypes, fn ($query) => $query->whereIn('product_type_id', $this->productTypes))
            ->get();
    }
    public function addToCart(int $productId): void
    {
        Cart::create([
            'user_id' => 1,
            'product_id' => $productId
        ]);

        Toaster::info("Added to Cart Successfully");
    }

    public function getFilters(): array
    {
        return [
            "Brand" => [ // filter header
                'livewireModel' => 'selectedBrands', // livewire model
                'modelFilters' => Brand::select('id', 'name')->withCount('products')->get(), // filters per filter category
                'withSeeMore' => false
            ],
            "Product Type" => [
                'livewireModel' => 'productTypes',
                'modelFilters' => ProductType::select('id', 'name')->withCount('products')->take($this->initialAmountToLoad)->get(),
                'withSeeMore' => false
            ],
            "Processor" => [
                'livewireModel' => 'processors',
                'modelFilters' => Processor::select('id', 'name')->withCount('products')->take($this->initialAmountToLoad)->get(),
                'withSeeMore' => $this->showSeeMore
            ],
        ];
    }

    protected function getTotalCount(): int
    {
        return Processor::count();
    }
    public function mount()
    {
        $this->initialAmountToLoad = 2;
    }

    public function render()
    {
        return view('livewire.index-guest-page', [
            'filters' => $this->getFilters(),
            'products' => $this->getProducts(),
            'cart' => Cart::all(),
            'wishlist' => 0,
        ]);
    }
}
