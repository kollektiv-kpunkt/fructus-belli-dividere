<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowMore extends Component
{
    public $buttonText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($buttonText = "Show more")
    {
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show-more');
    }
}
