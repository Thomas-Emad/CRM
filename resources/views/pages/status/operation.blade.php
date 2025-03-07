@extends('layouts.app')


@section('content')
    <livewire:status.status-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
