@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Call' : 'Update Call')

@section('content')
    <livewire:lead.activities.calls.call-operation type="{{ $type }}" lead_id="{{ $lead ?? null }}"
        id="{{ $call ?? null }}" />
@endsection
