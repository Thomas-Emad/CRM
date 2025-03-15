@extends('layouts.app')

@section('title', 'Show Lead')

@section('content')
    <livewire:lead.show-lead id="{{ $id ?? null }}" sourcePage="{{ $sourcePage ?? null }}" />
@endsection
