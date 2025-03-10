<?php

namespace App\Http\Controllers\Activities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($lead, $type = 'create')
    {
        return view('pages.lead.activities.calls.operation', compact('lead', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $type = 'edit')
    {
        return view('pages.lead.activities.calls.operation', compact('id', 'type'));
    }
}
