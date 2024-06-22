<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleButton extends Component
{

    public $route;
    public $buttonTitle;

    public function __construct($route, $buttonTitle)
    {
        $this->route = $route;
        $this->buttonTitle = $buttonTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.simple-button');
    }
}
