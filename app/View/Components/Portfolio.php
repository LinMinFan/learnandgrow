<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Portfolio as PortfolioModels;

class Portfolio extends Component
{

    public $portfolios;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->portfolios = PortfolioModels::orderBy('sort', 'asc')->take(2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.portfolio');
    }
}
