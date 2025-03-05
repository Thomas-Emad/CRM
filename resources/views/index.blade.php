@extends('layouts.app')

@section('content')
    {{ auth()->user() }}
@endsection
