<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Http\Repositories\Contracts\TicketRepository::class, \App\Http\Repositories\Eloquents\TicketRepositoryEloquent::class);
        //:end-bindings:
    }
}
