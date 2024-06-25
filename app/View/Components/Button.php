<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $variant;
    public $text;
    public $to;
    /**
     * Create a new component instance.
     */
    public function __construct($variant, $text, $to = '')
    {
        $this->variant = $variant;
        $this->text = $text;
        $this->to = $to;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
