<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Encore\Admin\Tree;
use App\Models\SiteMenu;

class Navigation extends Component
{

    public $itemLinks;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $tree = new Tree(new SiteMenu());
        $tree->query(function ($q) {
            return $q->select(['id', 'parent_id', 'title', 'uri']);
        });
        $this->itemLinks = json_decode(json_encode($tree->getItems()));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
