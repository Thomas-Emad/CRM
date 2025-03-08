<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
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
