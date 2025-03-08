@extends('layouts.app')

@section('title', 'Show Customer')

@section('content')
    <livewire:customer.show-customer id="{{ $id ?? null }}" />
@endsection
