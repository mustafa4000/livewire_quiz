@extends('layouts.master')

@push('styles')
  @livewireStyles
@endpush

@section('content')
    @livewire('todolists')
@endsection

@push('scripts')
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush