<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardPage;
use App\Http\Controllers\{CustomerController, StatusController, SourceController, GroupController, LeadController, TeamController};

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    Route::resource('statuses', StatusController::class)->only(['index', 'create', 'edit']);
    Route::resource('sources', SourceController::class)->only(['index', 'create', 'edit']);
    Route::resource('groups', GroupController::class)->only(['index', 'create', 'edit']);
    Route::resource('leads', LeadController::class)->only(['index', 'create', 'edit', 'show']);
    Route::get('leads/show/{id}/interactive/{type}/{interactive?}', [LeadController::class, 'interactive'])->name('leads.interactive');

    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'edit', 'show']);
    Route::resource('teams', TeamController::class);
});


include_once('auth.php');
