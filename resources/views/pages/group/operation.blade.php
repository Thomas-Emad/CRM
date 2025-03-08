@extends('layouts.app')

@section('title', $type == 'create' ? 'Add New Group' : 'Update Group')

@section('content')
    <livewire:group.group-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
