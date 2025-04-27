<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductButton extends Component
{
    public $url;
    public $text;
    public $class;

    public function __construct($url, $text, $class = 'btn btn-primary mt-3')
    {
        $this->url = $url;
        $this->text = $text;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-button');
    }
}
