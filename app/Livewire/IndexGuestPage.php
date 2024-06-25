<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class IndexGuestPage extends Component
{
    public string $brand = '';

    public function render()
    {
        return view('livewire.index-guest-page', [
            'brands' => Brand::all(),
        ]);
    }
}
