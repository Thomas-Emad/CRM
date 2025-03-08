<?php

namespace App\Providers;

use App\Repositories\{
    StatusRepository,
    SourceRepository,
    GroupRepository,
    LeadRepository,
    CustomerRepository,
    InteractiveRepository
};
use App\Interfaces\{
    StatusRepositoryInterface,
    SourceRepositoryInterface,
    GroupRepositoryInterface,
    LeadRepositoryInterface,
    CustomerRepositoryInterface,
    InteractiveRepositoryInterface
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(SourceRepositoryInterface::class, SourceRepository::class);
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(LeadRepositoryInterface::class, LeadRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(InteractiveRepositoryInterface::class, InteractiveRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
