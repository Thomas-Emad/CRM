@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Status' : 'Update Status')

@section('content')
    <livewire:status.status-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
