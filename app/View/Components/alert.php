<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    public string|null $text;
    public string|null $style;
    /**
     * Create a new component instance.
     */
    public function __construct(string $text = null, string $style = null)
    {
        $this->text = $text;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
<div>
    <h1 style="border: 1px solid green; padding: 20px; width: 150px">{{ $text }}</h1>
</div>
blade;
    }
}
