@extends('layouts.app')

@section('title', 'Show Call')

@section('content')
    <livewire:lead.activities.calls.show-call id="{{ $activity ?? null }}" />
@endsection
