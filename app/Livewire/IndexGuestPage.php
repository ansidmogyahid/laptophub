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

    public string $layout = 'grid';

    protected function queryString()
    {
        return [
            'search' => ['as' => 'q', 'except' => ''],
            'selectedBrands' => ['as' => 'visibleDatas', 'except' => []],
            'layout' => ['as' => 'layoutView', 'except' => '']
        ];
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
            ->when($this->selectedBrands, function ($query){
                return $query->whereIn('brand_id', $this->selectedBrands);
            })->get();
    }
    public function addToCart()
    {
        $messages = [
            'A blessing in disguise',
            'Bite the bullet',
            'Call it a day',
            'Easy does it',
            'Make a long story short',
            'Miss the boat',
            'To get bent out of shape',
            'Birds of a feather flock together',
            "Don't cry over spilt milk",
            'Good things come',
            'Live and learn',
            'Once in a blue moon',
            'Spill the beans',
        ];


        $this->notify($messages[array_rand($messages)]);
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
