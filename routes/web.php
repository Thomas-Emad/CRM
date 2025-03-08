<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardPage;
use App\Livewire\Lead\{LeadPage, LeadOperation, ShowLead};
use App\Livewire\Lead\Interactive\InteractiveOperation;
use App\Livewire\Customer\{CustomerPage, CustomerOperations, ShowCustomer};
use App\Http\Controllers\{CustomerController, StatusController, SourceController, GroupController, LeadController};


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    // Customers
    // Route::group(['as' => 'customer.', 'prefix' => 'customers'], function () {
    //     Route::get('/', CustomerPage::class)->name('index');
    //     Route::get('/show/{id}', ShowCustomer::class)->name('show');
    //     Route::get('/{type}/{id?}', CustomerOperations::class)->name('operation');
    // });
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    Route::resource('statuses', StatusController::class)->only(['index', 'create', 'edit']);
    Route::resource('sources', SourceController::class)->only(['index', 'create', 'edit']);
    Route::resource('groups', GroupController::class)->only(['index', 'create', 'edit']);
    Route::resource('leads', LeadController::class)->only(['index', 'create', 'edit', 'show']);
    Route::get('leads/show/{id}/interactive/{type}/{interactive?}', [LeadController::class, 'interactive'])->name('leads.interactive');

    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'edit', 'show']);
});


include('auth.php');
