<?php

namespace App\View\Components\Card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostItem extends Component
{
    public $post;
    public $isVoted;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $isVoted)
    {
        $this->post = $post;
        $this->isVoted = $isVoted;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.post-item');
    }
}
