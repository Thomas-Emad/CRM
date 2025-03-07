@extends('layouts.app')

@section('content')
    <livewire:group.group-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
