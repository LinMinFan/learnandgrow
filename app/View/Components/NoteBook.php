<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Admin\Post;

class NoteBook extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::with('categories')
        ->where('status',1)
        ->orderBy('sort', 'asc')->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.note-book');
    }
}
