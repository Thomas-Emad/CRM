@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Lead' : 'Update Lead')

@section('content')
    <livewire:lead.lead-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
