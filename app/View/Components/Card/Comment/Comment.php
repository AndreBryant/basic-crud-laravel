<?php

namespace App\View\Components\Card\Comment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    public $post;
    public $comment;
    public $edit;
    public $editCommentId;
    public $errors;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $comment, $edit = false, $editCommentId = null, $errors = null)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->edit = $edit;
        $this->editCommentId = $editCommentId;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.comment.comment');
    }
}
