<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LeadController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using(PermissionEnum::CRM_LEAD->value)),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.lead.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $type = 'create')
    {
        return view('pages.lead.operation', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $type = 'edit')
    {
        return view('pages.lead.operation', compact('id', 'type'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return view('pages.lead.show', compact('id'));
    }

    /**
     * Show interactive
     */
    public function interactive(string $id, string $type = 'create', $interactive = null)
    {
        return view('pages.lead.interactive', compact('id', 'type', 'interactive'));
    }
}
