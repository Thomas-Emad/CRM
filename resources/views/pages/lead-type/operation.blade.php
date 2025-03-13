@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Type' : 'Update Type')

@section('content')
    <livewire:lead-type.lead-type-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
