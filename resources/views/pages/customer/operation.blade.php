@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Customer' : 'Update Customer')

@section('content')
    <livewire:customer.customer-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
