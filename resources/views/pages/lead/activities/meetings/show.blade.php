@extends('layouts.app')

@section('title', 'Show Meeting')

@section('content')
    <livewire:lead.activities.meetings.show-meeting id="{{ $activity ?? null }}" />
@endsection
