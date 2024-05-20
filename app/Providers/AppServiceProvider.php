<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DocumentoRepoInterfaz;
use App\Repositories\DocumentoRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(DocumentoRepoInterfaz::class, DocumentoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
