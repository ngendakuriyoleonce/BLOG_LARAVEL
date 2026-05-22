<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;


class ArticleComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public string $title;
    public Collection $articles;
    public function __construct(string $title,Collection $articles)
    {
       $this->title=$title;
        $this->articles=$articles;
    } 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-component');
    }
}
