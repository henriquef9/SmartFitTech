<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $especial,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        if($this->especial == 'true'){
            $especial = 'especial';
        }else{
            $especial = '';
        }

        return view('components.item-menu', compact('especial'));
    }
}
