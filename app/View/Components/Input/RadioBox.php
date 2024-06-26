<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioBox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label = '',
        public ?string $id = null,
        public bool $showRadioBox = true,
        public bool $active = false,
        public bool $radioIcon = false,
        public bool $showLabel = true,
        public string $value = "",
    )
    {
        //
    }

    public function getRadioBoxClass(): string
    {
        $srOnlyIfNotVisible = '';
        if (! $this->showRadioBox) {
            $srOnlyIfNotVisible = 'sr-only';
        }

        return $srOnlyIfNotVisible;
    }

    public function getLabelClass(): string
    {
        $srOnlyIfNotVisible = '';
        if (! $this->showLabel) {
            $srOnlyIfNotVisible = 'sr-only';
        }

        $selectedClass = '';
        if($this->active){
            $selectedClass = 'text-blue-600';
        }

        return "ml-1 cursor-pointer " . $srOnlyIfNotVisible . $selectedClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.radiobox');
    }
}
