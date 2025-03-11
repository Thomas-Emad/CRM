@extends('layouts.app')

@section('title', 'Show Call')

@section('content')
    <livewire:lead.activities.meetings.show-meeting id="{{ $activity ?? null }}" />
@endsection
