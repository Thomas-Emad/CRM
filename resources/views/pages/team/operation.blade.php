@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Team' : 'Update Team')

@section('content')
    <livewire:team.team-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
