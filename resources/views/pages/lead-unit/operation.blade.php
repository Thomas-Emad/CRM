@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Unit' : 'Update Unit')

@section('content')
    <livewire:lead-unit.lead-unit-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
