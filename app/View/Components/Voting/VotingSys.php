<?php

namespace App\View\Components\Voting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VotingSys extends Component
{
    public $isVoted;
    public $rating;
    public $post;
    /**
     * Create a new component instance.
     */
    public function __construct($isVoted, $rating, $post)
    {
        $this->isVoted = $isVoted;
        $this->rating = $rating;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.voting.voting-sys');
    }
}
