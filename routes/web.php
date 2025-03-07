<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardPage;
use App\Livewire\Lead\{LeadPage, LeadOperation, ShowLead};
use App\Livewire\Lead\Interactive\InteractiveOperation;
use App\Livewire\Customer\{CustomerPage, CustomerOperations, ShowCustomer};
use App\Http\Controllers\{StatusController, SourceController, GroupController};


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    // Status
    // Route::group(['as' => 'status.', 'prefix' => 'statuses'], function () {
    //     Route::get('/', StatusPage::class)->name('index');
    //     Route::get('/{type}/{id?}', StatusOperation::class)->name('operation');
    // });

    // Source
    // Route::group(['as' => 'source.', 'prefix' => 'sources'], function () {
    //     Route::get('/', SourcePage::class)->name('index');
    //     Route::get('/{type}/{id?}', SourceOperation::class)->name('operation');
    // });

    // Group
    // Route::group(['as' => 'group.', 'prefix' => 'groups'], function () {
    //     Route::get('/', GroupPage::class)->name('index');
    //     Route::get('/{type}/{id?}', GroupOperation::class)->name('operation');
    // });

    // Leads
    Route::group(['as' => 'lead.', 'prefix' => 'leads'], function () {
        Route::get('/', LeadPage::class)->name('index');
        Route::get('/operation/{type}/{id?}', LeadOperation::class)->name('operation');
        Route::get('/show/{id}', ShowLead::class)->name('show');
        Route::get('/show/{id}/interactive/{type}/{interactive?}', InteractiveOperation::class)->name('interactive');
    });


    // Customers
    Route::group(['as' => 'customer.', 'prefix' => 'customers'], function () {
        Route::get('/', CustomerPage::class)->name('index');
        Route::get('/show/{id}', ShowCustomer::class)->name('show');
        Route::get('/{type}/{id?}', CustomerOperations::class)->name('operation');
    });
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    Route::resource('statuses', StatusController::class)->only(['index', 'create', 'edit']);
    Route::resource('sources', SourceController::class)->only(['index', 'create', 'edit']);
    Route::resource('groups', GroupController::class)->only(['index', 'create', 'edit']);
});


include('auth.php');
