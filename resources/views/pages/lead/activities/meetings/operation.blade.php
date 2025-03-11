@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Meeting' : 'Update Meeting')

@section('content')
    <livewire:lead.activities.meetings.meeting-operation type="{{ $type }}" lead_id="{{ $lead ?? null }}"
        id="{{ $call ?? null }}" />
@endsection
