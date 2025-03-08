<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type = 'create')
    {
        return view('pages.customer.operation', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $type = 'edit')
    {
        return view('pages.customer.operation', compact('id', 'type'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.customer.show', compact('id'));
    }
}
