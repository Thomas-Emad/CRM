@extends('layouts.app')

@section('content')
    <livewire:source.source-operation type="{{ $type }}" id="{{ $id ?? null }}" />
@endsection
