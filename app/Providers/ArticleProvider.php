<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Support\ServiceProvider;

class ArticleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected array $policies = [
    Article::class => ArticlePolicy::class, //importer non poolices
];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
