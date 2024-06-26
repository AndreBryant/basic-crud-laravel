<?php

namespace App\View\Components\Card\Comment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditComment extends Component
{
    public $post;
    public $to;
    public $comment;
    public $errors;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $to, $comment, $errors = null)
    {
        $this->to = $to;
        $this->comment = $comment;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.comment.edit-comment');
    }
}
