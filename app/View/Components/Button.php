<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'button',
        public ?string $title = '',
        public string $size = 'md',
        public string $color = '',
        public bool $outlined = false,
        public ?string $roundedSize = '',
    )
    {
        //
    }

    public function getButtonClass():string
    {
        $defaultClass = "w-full transition-colors ";
        $solidButtonClass = $defaultClass .' '. $this->getRoundedSizeClass() .' '. $this->getBackgroundClass() .' '. $this->getSizeClass();
        $outlineButtonClass = 'text-blue-600 hover:underline';
        return $this->outlined ? $outlineButtonClass : $solidButtonClass;
    }

    public function getRoundedSizeClass(): string
    {
        return match ($this->roundedSize){
            'none' => '',
            'sm' => 'rounded',
            default => 'rounded-md'
        };
    }

    public function getBackgroundClass(): string
    {
        return match ($this->color){
            'red' => 'bg-red-600 hover:bg-red-500 text-white',
            'indigo' => 'bg-indigo-600 hover:bg-indigo-500 text-white',
            'blue' => 'bg-blue-600 hover:bg-blue-500 text-white',
            default => 'bg-zinc-900 hover:bg-zinc-800 text-white',
        };
    }

    public function getSizeClass(): string
    {
        return match ($this->size){
            'sm' => 'py-1 px-3.5',
            'md' => 'px-5 py-1.5',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
