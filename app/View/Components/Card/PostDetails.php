<?php

namespace App\View\Components\Card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostDetails extends Component
{
    public $post;
    public $hasVoted;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $hasVoted)
    {
        $this->post = $post;
        $this->hasVoted = $hasVoted;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.post-details');
    }
}
