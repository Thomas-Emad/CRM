@extends('layouts.app')

@section('title', 'Show Team')

@section('content')
    <livewire:team.show-team id="{{ $id ?? null }}" />
@endsection
