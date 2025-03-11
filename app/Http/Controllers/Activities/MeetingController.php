<?php

namespace App\Http\Controllers\Activities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($lead)
    {
        $type = 'create';
        return view('pages.lead.activities.meetings.operation', compact('lead', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lead, $call)
    {
        $type = 'edit';
        return view('pages.lead.activities.meetings.operation', compact('type', 'lead', 'call'));
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $lead
     * @param  int  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($lead, $activity)
    {
        $type = 'create';
        return view('pages.lead.activities.meetings.show', compact('activity'));
    }
}
