@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Source' : 'Update Source')

@section('content')
    <livewire:source.source-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
