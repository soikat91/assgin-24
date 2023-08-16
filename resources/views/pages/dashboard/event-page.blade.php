@extends('layouts.sidenav-layout')

@section('content')
@include('components.Event.event-list')

@include('components.Event.event-delete')
@include('components.Event.event-create')
@include('components.Event.event-update')
@include('components.Event.event-show')

@endsection