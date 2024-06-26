<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class IndexGuestPage extends Component
{
    public string $search = '';

    public array $selectedBrands = [];

    protected function queryString()
    {
        return [
            'search' => ['as' => 'q', 'except' => ''],
            'selectedBrands' => ['as' => 'brand_id']
        ];
    }

    public function updatedSelectedBrands($property, $value)
    {
        $this->getProducts();
    }

    public function getProducts()
    {
        return Product::where('name', 'LIKE', "%{$this->search}%" ?? '')
            ->when($this->selectedBrands, function ($query){
                return $query->whereIn('brand_id', $this->selectedBrands);
            })->get();
    }
    public function addToCart()
    {
        dd("Add to Cart");
    }

    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.index-guest-page', [
            'brands' => Brand::all(),
            'products' => $this->getProducts()
        ]);
    }
}
