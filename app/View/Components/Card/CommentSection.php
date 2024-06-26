<?php

namespace App\View\Components\Card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentSection extends Component
{
    public $post;
    public $comments;
    public $edit;
    public $editCommentId;
    public $errors;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $comments, $edit = false, $editCommentId = null, $errors = null)
    {
        $this->post = $post;
        $this->comments = $comments;
        $this->edit = $edit;
        $this->editCommentId = $editCommentId;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.comment-section');
    }
}
