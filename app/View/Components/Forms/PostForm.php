<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostForm extends Component
{
    public $post;
    public $action;
    public $method;
    public $submitText;
    public $errors;
    /**
     * Create a new component instance.
     */
    public function __construct($post = null, $action, $method, $submitText, $errors = null)
    {
        $this->post = $post;
        $this->action = $action;
        $this->method = $method;
        $this->submitText = $submitText;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-form');
    }
}
