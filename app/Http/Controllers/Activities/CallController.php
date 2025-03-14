<?php

namespace App\Http\Controllers\Activities;

use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CallController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:' . PermissionEnum::CRM_ACTIVIY_NOTE->value, only: ['index']),
            new Middleware('permission:' . PermissionEnum::CRM_ACTIVIY_SHOW->value, only: ['show']),
            new Middleware('permission:' . PermissionEnum::CRM_ACTIVIY_OPERATION->value, only: ['create', 'edit']),
        ];
    }

    public function index()
    {
        return view('pages.activities.calls');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lead)
    {
        $type = 'create';
        return view('pages.lead.activities.calls.operation', compact('lead', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lead, $activity)
    {
        $type = 'edit';
        return view('pages.lead.activities.calls.operation', compact('type', 'activity', 'lead'));
    }

    public function show($lead, $activity)
    {
        $type = 'create';
        return view('pages.lead.activities.calls.show', compact('lead', 'activity'));
    }
}
