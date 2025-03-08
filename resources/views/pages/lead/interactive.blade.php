@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Interactive' : 'Update Interactive')

@section('content')
    <livewire:lead.Interactive.interactive-operation type="{{ $type }}" id="{{ $id ?? null }}"
        interactive="{{ $interactive ?? null }}" />
@endsection
