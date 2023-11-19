<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slide;

class Carousel extends Component
{

    public $slideImages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->slideImages = Slide::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
