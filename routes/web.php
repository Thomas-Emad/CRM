<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardPage;
use App\Http\Controllers\{CustomerController, StatusController, SourceController, LeadUnitController, LeadTypeController, LeadController, TeamController};
use App\Http\Controllers\Activities\{CallController, MeetingController};

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('home');

    Route::resource('statuses', StatusController::class)->only(['index', 'create', 'edit']);
    Route::resource('sources', SourceController::class)->only(['index', 'create', 'edit']);
    Route::resource('leads', LeadController::class)->only(['index', 'create', 'edit', 'show']);

    // All Calls / Activities
    Route::get('calls', [CallController::class, 'index'])->name('leads.activities.calls.index');
    Route::group(['prefix' => 'leads/{lead}/activities/calls', 'as' => 'leads.activities.calls.', 'controller' => CallController::class], function () {
        Route::get('/', 'create')->name('create');
        Route::get('{activity}/edit', 'edit')->name('edit');
        Route::get('{activity}/show', 'show')->name('show');
    });

    // All Meeting / Activities
    Route::get('meetings', [MeetingController::class, 'index'])->name('leads.activities.meetings.index');
    Route::group(['prefix' => 'leads/{lead}/activities/meetings', 'as' => 'leads.activities.meetings.', 'controller' => MeetingController::class], function () {
        Route::get('/', 'create')->name('create');
        Route::get('{activity}/edit', 'edit')->name('edit');
        Route::get('{activity}/show', 'show')->name('show');
    });
    Route::resource('lead-units', LeadUnitController::class)->only(['index', 'create', 'edit']);
    Route::resource('lead-types', LeadTypeController::class)->only(['index', 'create', 'edit']);


    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'edit', 'show']);
    Route::resource('teams', TeamController::class);
});


include_once('auth.php');
