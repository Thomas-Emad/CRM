<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LeadTypeController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using(PermissionEnum::CRM_LEAD_TYPE->value)),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.lead-type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type = 'create')
    {
        return view('pages.lead-type.operation', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $type = 'edit')
    {
        return view('pages.lead-type.operation', compact('id', 'type'));
    }
}
