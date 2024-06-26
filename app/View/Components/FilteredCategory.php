<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredCategory extends Component
{
    public $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function render(): View|Closure|string
    {
        return view('components.filtered-category');
    }
}
