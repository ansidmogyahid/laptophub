<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class IndexGuestPage extends Component
{
    public function render()
    {
        return view('livewire.index-guest-page');
    }
}
