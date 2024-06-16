<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredGenre extends Component
{
    public $genres;

    public function __construct($genres)
    {
        $this->genres = $genres;
    }

    public function render(): View|Closure|string
    {
        return view('components.filtered-genre');
    }
}
