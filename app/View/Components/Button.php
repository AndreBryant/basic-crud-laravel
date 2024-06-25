<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $text;
    public $to;
    public $variant;
    /**
     * Create a new component instance.
     */
    public function __construct($text, $to, $variant)
    {
        $this->text = $text;
        $this->to = $to;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
