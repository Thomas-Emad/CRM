<?php

namespace App\Providers;

use App\Repositories\{
    StatusRepository,
    SourceRepository,
    LeadRepository,
    LeadUnitRepository,
    LeadTypeRepository,
    CustomerRepository,
    TeamRepository,
    Activities\CallRepository,
    Activities\NoteRepository,
    Activities\MeetingRepository,
};
use App\Interfaces\{
    StatusRepositoryInterface,
    SourceRepositoryInterface,
    LeadRepositoryInterface,
    LeadUnitRepositoryInterface,
    LeadTypeRepositoryInterface,
    CustomerRepositoryInterface,
    TeamRepositoryInterface,
    Activities\CallRepositoryInterface,
    Activities\NoteRepositoryInterface,
    Activities\MeetingRepositoryInterface,
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
        $this->app->bind(LeadUnitRepositoryInterface::class, LeadUnitRepository::class);
        $this->app->bind(LeadTypeRepositoryInterface::class, LeadTypeRepository::class);
        $this->app->bind(LeadRepositoryInterface::class, LeadRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(CallRepositoryInterface::class, CallRepository::class);
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
        $this->app->bind(MeetingRepositoryInterface::class, MeetingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
